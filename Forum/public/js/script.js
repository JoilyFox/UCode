let popUp = document.getElementById('headerPopUp');
let popUpAll = document.getElementById('profilePopUp');

function showPopUp() {

    if (popUp.classList.contains('active')) {
        popUp.classList.remove('active');

        setTimeout(() => {
            popUp.style.display = 'none';
        }, 100);
    } else {
        popUp.style.display = 'block';

        setTimeout(() => {
            popUp.classList.add('active');
        }, 100);
    }

}

function hide() {
    popUp.classList.remove('active');

    setTimeout(() => {
        popUp.style.display = 'none';
    }, 100);
}
