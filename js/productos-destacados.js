// Script para manejar la sección de productos destacados
document.addEventListener('DOMContentLoaded', function() {
    // Elementos para la navegación de productos destacados
    const productSlider = document.querySelector('.product-slider');
    const prevProductBtn = document.getElementById('prevProductBtn');
    const nextProductBtn = document.getElementById('nextProductBtn');
    
    if (productSlider && prevProductBtn && nextProductBtn) {
        let productIndex = 0;
        const productCards = document.querySelectorAll('.product-card');
        const totalProducts = productCards.length;
        
        // Función para actualizar la visualización de productos
        const updateProductSlider = () => {
            const screenWidth = window.innerWidth;
            let visibleProducts;
            
            // Determinar cuántos productos mostrar según el ancho de pantalla
            if (screenWidth >= 1200) {
                visibleProducts = 4; // Pantallas grandes
            } else if (screenWidth >= 768) {
                visibleProducts = 2; // Tablets
            } else {
                visibleProducts = 1; // Móviles
            }
            
            const maxIndex = Math.max(0, totalProducts - visibleProducts);
            
            // Limitar el índice
            if (productIndex < 0) productIndex = 0;
            if (productIndex > maxIndex) productIndex = maxIndex;
            
            // Calcular el desplazamiento
            const cardWidth = 100 / visibleProducts;
            const translateX = -productIndex * cardWidth;
            
            // Aplicar la transformación
            productSlider.style.transform = `translateX(${translateX}%)`;
            
            // Actualizar estado de los botones
            prevProductBtn.disabled = productIndex === 0;
            nextProductBtn.disabled = productIndex >= maxIndex;
        };
        
        // Eventos para los botones
        prevProductBtn.addEventListener('click', () => {
            productIndex--;
            updateProductSlider();
        });
        
        nextProductBtn.addEventListener('click', () => {
            productIndex++;
            updateProductSlider();
        });
        
        // Actualizar en cambio de tamaño de ventana
        window.addEventListener('resize', updateProductSlider);
        
        // Inicializar
        updateProductSlider();
    }
});