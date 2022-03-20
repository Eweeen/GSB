const filterButton = document.querySelector('#button-filter');

filterButton.addEventListener('click', () => {
    document.querySelector('.filter_nav').classList.toggle('active');
});