function validateForm() {
    var name = document.getElementById('name').value;
    var email = document.getElementById('email').value;
    var address = document.getElementById('address').value;

    if (name === "" || email === "" || address === "") {
        alert("Semua field harus diisi!");
        return false;
    }
    alert("Pendaftaran berhasil!");
    return true;
}
