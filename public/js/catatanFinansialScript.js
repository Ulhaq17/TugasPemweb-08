document.addEventListener("DOMContentLoaded", (event) => {
    const menuIcon = document.querySelector(".menu-icon");
    const navbarMenu = document.querySelector(".navbar-menu");

    menuIcon.addEventListener("click", () => {
        navbarMenu.classList.toggle("active");
    });

    const nominalInput = document.getElementById("nominal_transaksi");

    nominalInput.addEventListener("input", function () {
        let value = nominalInput.value.replace(/[^\d]/g, "");

        nominalInput.value = new Intl.NumberFormat("id-ID").format(value);
    });

    document
        .getElementById("addTransactionForm")
        .addEventListener("submit", function (event) {
            nominalInput.value = nominalInput.value.replace(/[^\d]/g, "");
        });

    // Handle update form popup
    const updateButtons = document.querySelectorAll(".btn-update");
    const updateFormPopup = document.getElementById(
        "updateTransactionFormPopup"
    );
    const updateForm = document.getElementById("updateTransactionForm");
    const updateTanggalInput = document.getElementById(
        "update_tanggal_transaksi"
    );
    const updateTipeSelect = document.getElementById("update_tipe_transaksi");
    const updateKategoriSelect = document.getElementById(
        "update_kategori_transaksi"
    );
    const updateNominalInput = document.getElementById(
        "update_nominal_transaksi"
    );
    const updateDeskripsiInput = document.getElementById(
        "update_deskripsi_transaksi"
    );

    updateButtons.forEach((button) => {
        button.addEventListener("click", function (event) {
            event.preventDefault();
            const id = this.dataset.id;
            const tanggal = this.dataset.tanggal;
            const tipe = this.dataset.tipe;
            const kategori = this.dataset.kategori;
            const nominal = this.dataset.nominal;
            const deskripsi = this.dataset.deskripsi;

            updateForm.action = `/catatanfinansial/${id}`;
            updateTanggalInput.value = tanggal;
            updateTipeSelect.value = tipe;
            updateKategoriSelect.value = kategori;
            updateNominalInput.value = new Intl.NumberFormat("id-ID").format(
                nominal
            );
            updateDeskripsiInput.value = deskripsi;

            updateFormPopup.style.display = "block";
        });
    });

    updateNominalInput.addEventListener("input", function () {
        let value = updateNominalInput.value.replace(/[^\d]/g, "");

        updateNominalInput.value = new Intl.NumberFormat("id-ID").format(value);
    });

    updateForm.addEventListener("submit", function (event) {
        updateNominalInput.value = updateNominalInput.value.replace(
            /[^\d]/g,
            ""
        );
    });

    document
        .getElementById("addTransactionForm")
        .addEventListener("submit", function (event) {
            var fileInput = document.getElementById("file_transaksi");
            var filePath = fileInput.value;
            var allowedExtensions = /(\.jpg|\.png|\.pdf)$/i;

            if (!allowedExtensions.exec(filePath)) {
                alert(
                    "Hanya file dengan ekstensi .jpg, .png, atau .pdf yang diizinkan."
                );
                event.preventDefault();
                return false;
            }

            if (fileInput.files[0].size > 2097152) {
                alert("Ukuran file terlalu besar. Maksimum 2MB.");
                event.preventDefault();
                return false;
            }

            return true;
        });
});

function closeUpdateForm() {
    document.getElementById("updateTransactionFormPopup").style.display =
        "none";
}
