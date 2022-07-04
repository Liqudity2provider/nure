window.onload = () => {
    const xForm = document.getElementById("nurse_list_ward");
    const yForm = document.getElementById("nurse_department");
    const pForm = document.getElementById("nurse_department_shift");

    xForm.addEventListener("submit", function (event) {
        event.preventDefault();

        const first = new FormData(this);
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "server.php");
        xhr.responseType = 'text';
        xhr.send(first);

        xhr.onload = () => {
            document.getElementById("content").innerHTML = xhr.responseText;
        }
    })

    yForm.addEventListener("submit", function (event) {
        event.preventDefault();

        const formDataTraffic = new FormData(this);

        fetch("server.php", {
            method: "post",
            body: formDataTraffic,
        })
            .then((response) => response.json())
            .then((res) => document.getElementById("content").innerHTML = res)
    })

    pForm.addEventListener("submit", function (event) {
        event.preventDefault();

        const formDataBalance = new FormData(this);
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "server.php");
        xhr.responseType = 'document';
        xhr.send(formDataBalance);

        xhr.onload = () => {
            console.log(xhr.response)
            document.getElementById("content").innerHTML = xhr.responseXML.body.innerHTML;
        }
    })
}