document.addEventListener("DOMContentLoaded", function () {
    /////// Prevent closing from click inside dropdown
    document.querySelectorAll('.dropdown-menu').forEach(function (element) {
        element.addEventListener('click', function (e) {
            e.stopPropagation();
        });
    })
    // make it as accordion for smaller screens
    if (window.innerWidth < 992) {

        // close all inner dropdowns when parent is closed
        document.querySelectorAll('.navbar .dropdown').forEach(function (everydropdown) {
            everydropdown.addEventListener('hidden.bs.dropdown', function () {
                // after dropdown is hidden, then find all submenus
                this.querySelectorAll('.submenu').forEach(function (everysubmenu) {
                    // hide every submenu as well
                    everysubmenu.style.display = 'none';
                });
            })
        });
        document.querySelectorAll('.dropdown-menu a').forEach(function (element) {
            element.addEventListener('click', function (e) {

                let nextEl = this.nextElementSibling;
                if (nextEl && nextEl.classList.contains('submenu')) {
                    // prevent opening link if link needs to open dropdown
                    e.preventDefault();
                    console.log(nextEl);
                    if (nextEl.style.display == 'block') {
                        nextEl.style.display = 'none';
                    } else {
                        nextEl.style.display = 'block';
                    }
                }
            });
        })
    }

    const paramsWrapper = document.querySelector('.params-wrapper');
    const sectionSelect = document.querySelector('.section-select');
    if (paramsWrapper && sectionSelect) {
        sectionSelect.addEventListener('change', async function () {
            paramsWrapper.innerHTML = '';
            let selectValue = sectionSelect.options[sectionSelect.selectedIndex].value;
            let response = await fetch('http://shogo-test' + '/section_params/' + selectValue);
            if (response.ok) {
                let json = await response.text();
                console.log(json);
                paramsWrapper.innerHTML = json;
            } else {
                alert("Ошибка HTTP: " + response.status);
            }
        })
    }
});
