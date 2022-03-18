document.addEventListener('DOMContentLoaded', function () {

    let form = document.querySelector("#FormPet");

    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        locale: 'es',
        displayEventTime: false,
        headerToolbar: {
            left: 'prev,next today',
            center: 'title',
            right: 'dayGridMonth,listWeek'
        },

        eventSources: {
            url: Route + "/cita/view",
            method: "POST",
            extraParams: {
                _token: form._token.value,
            }
        },

        dateClick: function (info) {

            form.reset();

            form.start.value = info.dateStr;
            form.end.value = info.dateStr;

            $("#newevent").modal('show');

            document.getElementById('btnSave').disabled = false;
            document.getElementById('btnUpdate').disabled = true;
            document.getElementById('btnDelete').disabled = true;
        },

        eventClick: function (info) {

            var data = info.event;

            axios.post(Route + "/cita/edit/" + info.event.id)
                .then(
                    (answer) => {

                        form.id.value = answer.data.id;
                        form.title.value = answer.data.title;
                        form.documentOwner.value = answer.data.documentOwner;
                        form.nameOwner.value = answer.data.nameOwner;
                        form.numberOwner.value = answer.data.numberOwner;
                        form.namePet.value = answer.data.namePet;
                        form.descripcionPet.value = answer.data.descripcionPet;
                        form.start.value = answer.data.start;
                        form.timePet.value = answer.data.timePet;
                        form.end.value = answer.data.end;

                        $("#newevent").modal('show');

                        document.getElementById('btnSave').disabled = true;

                        var timePet = answer.data.timePet;
                        var timeArray = timePet.split(":");

                        var aux = Date.parse(answer.data.start);
                        var timeEvent = new Date(aux);

                        timeEvent.setDate(timeEvent.getDate() + 1);
                        timeEvent.setHours(timeArray[0]);
                        timeEvent.setMinutes(timeArray[1]);

                        var timeLimit = new Date();
                        timeLimit.setHours(timeLimit.getHours() + 2);

                        console.log("Fecha cita: " + timeEvent);
                        console.log("Fecha limite: " + timeLimit);

                        if (timeLimit > timeEvent) {
                            console.log("Se cumplieron las 2 horas");
                            document.getElementById('btnUpdate').disabled = true;
                            document.getElementById('btnDelete').disabled = false;
                        } else if (timeLimit < timeEvent) {
                            console.log("Se puede modificar");
                            document.getElementById('btnUpdate').disabled = false;
                            document.getElementById('btnDelete').disabled = false;
                        }

                    }
                ).catch(
                    error => {
                        if (error.response) {
                            console.log(error.response.data);
                        }
                    }
                )

        }
    });

    calendar.render();

    document.getElementById("btnSave").addEventListener("click", function () {
        method("/cita/new");
    });

    document.getElementById("btnDelete").addEventListener("click", function () {
        method("/cita/delete/" + form.id.value);
    });

    document.getElementById("btnUpdate").addEventListener("click", function () {
        method("/cita/update/" + form.id.value);
    });

    function method(path) {
        const data = new FormData(form);

        const NewRoute = Route + path;

        axios.post(NewRoute, data)
            .then(
                (answer) => {

                    calendar.refetchEvents();

                    $("#newevent").modal('hide');
                }
            ).catch(
                error => {
                    if (error.response) {
                        console.log(error.response.data);
                    }
                }
            )
    }
});
