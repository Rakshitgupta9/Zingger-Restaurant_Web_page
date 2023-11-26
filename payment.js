document.addEventListener("DOMContentLoaded", function () {
    const paymentForm = document.getElementById("paymentForm");

    paymentForm.addEventListener("submit", function (event) {
        event.preventDefault(); // Prevent the form from submitting normally
        
        // Get the selected payment option
        const selectedOption = document.querySelector('input[name="payment"]:checked');

        if (selectedOption) {
            const optionId = selectedOption.id;

            // Perform the redirection based on the selected option
            switch (optionId) {
                case "creditCard":
                    window.location.href = "payment/credit_card.html";
                    break;
                case "upi":
                    window.location.href = "payment/upi.html";
                    break;
                case "qrCode":
                    window.location.href = "payment/qr_code.html";
                    break;
                case "cashOnDelivery":
                    window.location.href = "order_confirm.html";
                    break;
                default:
                    // Handle the default case if needed
                    break;
            }
        }
    });
});
