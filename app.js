let duedate = document.querySelector("#duedate");
duedate.value = "";

$(function () {
    $(".finished").click(function () {
        const id = $(this).closest("div").attr("id");
        $.post(
            "finished.php",
            {
                id: id,
            },
            (data) => {}
        );
        location.reload();
    });

    $(".delete").click(function () {
        const id = $(this).closest("div").attr("id");

        $.post(
            "delete.php",
            {
                id: id,
            },
            (data) => {}
        );
        location.reload();
    });

    $(".edit").click(function () {
        document.querySelector("#taskNo").value = $(this)
            .closest("div")
            .attr("id");
        let datepicker = document.querySelector("#duedateE");
        let description = $(this).attr("id");
        $("#descriptionE").text(description);

        let duedate = $(this).parent().parent().closest("div").attr("id");
        if (duedate == "") {
            $("#checkE").attr("checked", false);
            datepicker.value = "";
            document.querySelector("#duedateE").disabled = true;
        } else {
            $("#checkE").attr("checked", true);
            let ddate = new Date(duedate);
            let date =
                ddate.getFullYear() +
                "-" +
                (ddate.getMonth() + 1).toString().padStart(2, 0) +
                "-" +
                ddate.getDate().toString().padStart(2, 0);
            let time =
                adjust(ddate.getHours()) + ":" + adjust(ddate.getMinutes());
            datepicker.value = date + "T" + time;
            document.querySelector("#duedateE").disabled = false;
        }
        document.querySelector(".bg-modal-edit").style.display = "flex";
    });

    $("#checkE").change(function () {
        let datepicker = document.querySelector("#duedateE");
        if (this.checked) {
            let today = new Date();
            let date =
                today.getFullYear() +
                "-" +
                (today.getMonth() + 1).toString().padStart(2, 0) +
                "-" +
                today.getDate().toString().padStart(2, 0);
            let time =
                adjust(today.getHours()) + ":" + adjust(today.getMinutes());
            datepicker.value = date + "T" + time;
            document.querySelector("#duedateE").disabled = false;
        } else {
            datepicker.value = "";
            document.querySelector("#duedateE").disabled = true;
        }
    });

    $(".cancel").click(function () {
        document.querySelector(".bg-modal-edit").style.display = "none";
        location.reload();
    });
});

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

function adjust(v) {
    if (v > 9) {
        return v.toString();
    } else {
        return "0" + v.toString();
    }
}
