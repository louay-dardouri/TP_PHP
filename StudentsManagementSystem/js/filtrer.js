document.addEventListener('DOMContentLoaded', function () {
    const filterButton = document.querySelector('.filter-button');
    const filterInput = document.querySelector('.filter-input');
    const table = document.querySelector('#students-table');

    filterButton.addEventListener('click', function () {
        const input = filterInput.value.trim().toLowerCase();
        const rows = table.querySelectorAll('tr');
        const headerCells = table.querySelector('tr').querySelectorAll('th');
        let matchedIndex = -1;
        let idIndex = -1;
        let actionIndex = -1;
        headerCells.forEach((th, index) => {
            const nomColumn = th.textContent.trim().toLowerCase();
            if (nomColumn == 'id') idIndex = index;
            if (nomColumn == input) matchedIndex = index;
            if (nomColumn == 'actions') actionIndex = index;
        });

        rows.forEach(row => {
            const cells = row.querySelectorAll('td, th');
            cells.forEach((cell, index) => {
                if (index == idIndex || index == matchedIndex || index == actionIndex) {
                    cell.style.display = '';
                } else {
                    cell.style.display = (matchedIndex == -1) ? '' : 'none';
                }
            });
        });
    });
});
