document.addEventListener('DOMContentLoaded', function() {
    const quantityInputs = document.querySelectorAll('.pro-qty input');
    const totalElement = document.getElementById('totalAmount');
    const cartTable = document.getElementById('cartItems');
  
    // Xử lý xóa sản phẩm
    cartTable.addEventListener('click', function(event) {
      if (event.target.classList.contains('icon_close')) {
        const row = event.target.closest('tr');
        if (confirm('Bạn có chắc chắn muốn xóa sản phẩm này?')) {
          row.remove();
          calculateTotal();
        }
      }
    });
    // console.log(quantityInputs);

    // Xử lý thay đổi số lượng
    // quantityInputs.forEach(input => {
    //     console.log("hihi");
    //     input.addEventListener('change', () => {
    //     console.log("haha");
    //     const tr = input.closest('tr');
    //     // ... Tính toán tổng tiền cho hàng hiện tại ...
    //     calculateTotal();

    //   });
    // });

    quantityInputs.forEach(input => {
        input.addEventListener('input', () => {
            const value = input.value;
            if (!/^\d+$/.test(value)) {
                input.value = 0; // Xóa giá trị nếu không phải số
            } else {
                const tr = input.closest('tr');
                const spanElement = tr.querySelector('.stock-product-quantity');
                const quantityText = spanElement.textContent.trim(); 
                const stock_quantity = quantityText.replace(/[^0-9]/g, '');
                const quantity = parseInt(value, 10);
                if (quantity < 0) {
                    input.value = 0; // Xóa giá trị nếu âm
                } else if(quantity > stock_quantity){
                    input.value = stock_quantity;
                } else {
                    calculateTotal();
                }
            }
        });
    });
    
  
    // Hàm tính tổng tiền
    function calculateTotal() {
      const totalElements = document.querySelectorAll('.shoping__cart__total');
      let total = 0;
  
      totalElements.forEach(element => {
        total += parseFloat(element.textContent.replace('đ', '').replace('.', ''));
      });
  
      totalElement.textContent = total.toLocaleString('vi-VN', { style: 'currency', currency: 'VND' });
    }
  
    // Ngăn chặn submit form mặc định
    document.querySelector('form').addEventListener('submit', (event) => {
      event.preventDefault();
    });

    calculateTotal();
  });