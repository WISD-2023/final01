document.addEventListener('DOMContentLoaded', function () {
    // 監聽收禮者姓名選擇事件，自動帶入對應的電子郵件
    var recipientNameInput = document.getElementById('recipient_name');
    var recipientEmailInput = document.getElementById('recipient_email');

    recipientNameInput.addEventListener('change', function () {
        var selectedOption = this.options[this.selectedIndex];
        var recipientEmail = selectedOption.getAttribute('data-email');

        // 在這裡加入一行 console.log，以便我們檢查收禮者電子郵件是否正確獲取
        console.log('Recipient Email:', recipientEmail);

        recipientEmailInput.value = recipientEmail || '';
    });

    // 當頁面載入時也執行一次，確保初始值正確
    var initialRecipientEmail = recipientNameInput.options[recipientNameInput.selectedIndex].getAttribute('data-email');
    recipientEmailInput.value = initialRecipientEmail || '';
});