window.onload = function () {
    const id = document.getElementById("pdf");

    id.addEventListener("click", () => {
        let url = "../2023registroexposistemas/php/Generar_pdf.php";
        window.open(url, "_blank");
    });;
}