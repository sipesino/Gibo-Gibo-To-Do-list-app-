let duedate = document.querySelector("#duedate");
duedate.value = "";

document.querySelector(".addBtn").addEventListener("click", function () {
    document.querySelector(".bg-modal").style.display = "flex";
    document.querySelector("#duedate").disabled = true;
});

document.querySelector("#check").addEventListener("change", function () {
    if (this.checked) {
        let today = new Date();
        let date =
            today.getFullYear() +
            "-" +
            (today.getMonth() + 1).toString().padStart(2, 0) +
            "-" +
            today.getDate().toString().padStart(2, 0);
        let time = adjust(today.getHours()) + ":" + adjust(today.getMinutes());
        duedate.value = date + "T" + time;
        document.querySelector("#duedate").disabled = false;
    } else {
        duedate.value = "";
        document.querySelector("#duedate").disabled = true;
    }
});

document.querySelector(".cancel").addEventListener("click", function () {
    document.querySelector(".bg-modal").style.display = "none";
});

Date.prototype.toDateInputValue = function () {
    var local = new Date(this);
    local.setMinutes(this.getMinutes() - this.getTimezoneOffset());
    return local.toJSON().slice(0, 10);
};

function adjust(v) {
    if (v > 9) {
        return v.toString();
    } else {
        return "0" + v.toString();
    }
}
