document.addEventListener('DOMContentLoaded', function() {
    const containerInfo = document.getElementById('container-info');
    const categoriaSelect = document.getElementById('categoria_id');
    const btnImagesUploads = document.getElementById('btn-imagesUploads');
    const addsImgsEspecifics = document.getElementById('adds-imgs-especifics');

    const fileInputs = [
        'imageUpload-front',
        'left-view-product',
        'module-intermediate-li',
        'right-view-product',
        'module-intermediate-ld',
        'back-view-product',
        'complete-product',
        'detail-product',
        'box-view-product',
        'backrest-view-product',
        'furnitureset-view-product'
    ];

    const categoryButtons = {
        2: ['btn-imageUpload-front', 'btn-box-view-product', 'btn-backrest-view-product', 'btn-furnitureset-view-product'],
        3: ['btn-left-view-product', 'btn-right-view-product', 'btn-imageUpload-front', 'btn-back-view-product'],
        4: ['btn-left-view-product', 'btn-right-view-product', 'btn-imageUpload-front', 'btn-back-view-product'],
        5: ['btn-left-view-product', 'btn-right-view-product', 'btn-imageUpload-front'],
        6: ['btn-left-view-product', 'btn-right-view-product'],
        7: ['btn-left-view-product', 'btn-right-view-product', 'btn-module-intermediate-li', 'btn-module-intermediate-ri', 'btn-imageUpload-front'],
        8: ['btn-left-view-product', 'btn-right-view-product', 'btn-module-intermediate-li', 'btn-module-intermediate-ri', 'btn-imageUpload-front'],
        9: ['btn-left-view-product', 'btn-right-view-product', 'btn-imageUpload-front'],
        10: ['btn-imageUpload-front'],
        11: ['btn-imageUpload-front', 'btn-back-view-product']
    };

    function toggleDisplay(element, show) {
        element.style.display = show ? 'block' : 'none';
    }

    function resetButtons() {
        document.querySelectorAll('.image-btn').forEach(btn => {
            btn.classList.remove('btn-primary', 'btn-success');
            btn.classList.add('btn-secondary');
        });
    }

    function hideAll(elements) {
        elements.forEach(el => el.style.display = 'none');
    }

    function showCategoryButtons(categoryId) {
        const buttons = categoryButtons[categoryId] || [];
        hideAll(document.querySelectorAll('.button-status, .product-upload'));
        resetButtons();
        buttons.forEach(btnId => document.getElementById(btnId).style.display = 'flex');
        toggleDisplay(btnImagesUploads, buttons.length > 0);
        toggleDisplay(addsImgsEspecifics, buttons.length > 0);
        toggleDisplay(containerInfo, buttons.length > 0);
    }

    categoriaSelect.addEventListener('change', () => showCategoryButtons(categoriaSelect.value));

    document.addEventListener('click', function(event) {
        if (event.target.matches('.image-btn')) {
            const targetId = event.target.getAttribute('data-target');
            hideAll(document.querySelectorAll('.product-upload'));
            if (targetId) document.getElementById(targetId).style.display = 'block';
            resetButtons();
            event.target.classList.add('btn-primary');
            toggleDisplay(containerInfo, false);
        }
    });

    showCategoryButtons(categoriaSelect.value);
});