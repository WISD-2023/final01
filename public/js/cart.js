document.addEventListener('DOMContentLoaded', function () {
    const orderDetails = document.getElementById('orderDetails');
    let totalAmount = 0;

    function updateTotalAmount() {
        totalAmount = 0;
        [...orderDetails.children].forEach((tr) => {
            const totalPrice = parseFloat(tr.querySelector('.item-total').textContent.match(/\$([0-9.]+)/)[1]);
            totalAmount += totalPrice;
        });

        document.getElementById('totalAmount').textContent = `$${totalAmount.toFixed(2)}`;
    }

    function handleCheckboxChange(checkbox) {
        const id = checkbox.getAttribute('data-id');
        const name = checkbox.getAttribute('data-name');
        const price = parseFloat(checkbox.getAttribute('data-price'));
        const quantity = parseInt(checkbox.closest('.flex').querySelector('select[name="quantity"]').value);

        if (checkbox.checked) {
            // 新增至訂單明細
            const tr = document.createElement('tr');
            tr.innerHTML = `
                <td class="border border-gray-300 p-2 item-name">${name}</td>
                <td class="border border-gray-300 p-2 item-price">$${price.toFixed(2)}</td>
                <td class="border border-gray-300 p-2 item-quantity">${quantity}</td>
                <td class="border border-gray-300 p-2 item-total">$${(price * quantity).toFixed(2)}</td>
            `;
            orderDetails.appendChild(tr);
        } else {
            // 移除訂單明細
            const trToRemove = [...orderDetails.children].find((tr) => tr.querySelector('.item-name').textContent === name);
            if (trToRemove) {
                orderDetails.removeChild(trToRemove);
            }
        }

        // 重新計算訂單總額
        updateTotalAmount();
    }

    const checkboxes = document.querySelectorAll('input[name^="buy"]');
    checkboxes.forEach((checkbox) => {
        checkbox.addEventListener('change', function () {
            handleCheckboxChange(this);
        });
    });

    // 購買按鈕事件
    document.getElementById('purchaseButton').addEventListener('click', function () {
        // 將購買數據轉為 JSON 字符串（這取決於你的後端處理方式）
        const selectedProducts = [];
        checkboxes.forEach((checkbox) => {
            if (checkbox.checked) {
                const productId = checkbox.getAttribute('data-id');
                const quantity = parseInt(checkbox.closest('.flex').querySelector('select[name="quantity"]').value);
                selectedProducts.push({ productId, quantity });
            }
        });
        const jsonData = JSON.stringify(selectedProducts);

        // 在這裡可以使用 AJAX 或其他方式將購買數據發送到後端
        // 然後根據後端的處理結果執行相應操作，例如跳轉頁面

        // 暫時以警告框顯示
        alert('購買成功！');

        // 導向到訂單頁面
        window.location.href = '/order/create';
    });
});
