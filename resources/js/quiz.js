$(function() {

    $('input.chosen-answer').click(function(event) {
       event.preventDefault();

        $.ajax({
           method: "POST",
           url: QUIZ_DATA.sendAnswer + "play/" + $(this).data('id') + '/' + $(this).attr("value")
        })

        .done(function (response) {
            $('div#quiz-wrapper').empty();
                const html = '<div className="d-flex justify-content-center row">'+
                    '<div className="col-md-10 col-lg-10">'+
                        '<div className="border">'+
                '<div className="question bg-white p-4 border-bottom">' +
                '       <div className="d-flex flex-row align-items-center question-title">' +
                '            <h5 className="mt-1 ml-2">Słowo: ' + response.data.englishName + '</h5>' +
                '        </div> ' +

                '        <input type="radio" className="chosen-answer" id="wronganswera" name="wronganswera"' +
                '               data-id="' + response.data.id + '" value="' + getChecked(response.data.wrongAnswerA, response.checked) +' disabled>' +
                '            <label htmlFor="wronganswera">' + response.data.wrongAnswerA +'</label><br>' +

                '            <input type="radio" className="chosen-answer" id="wronganswerb" name="wronganswera"'+
                '                   data-id="' + response.data.id + '" value="' + getChecked(response.data.wrongAnswerB, response.checked) +' disabled>' +
                '                <label htmlFor="wronganswerb">' + response.data.wrongAnswerB +'</label><br>' +

                '                <input type="radio" className="chosen-answer" id="wronganswerc" name="wronganswera"' +
                '                       data-id="' + response.data.id + '" value="' + getChecked(response.data.wrongAnswerC, response.checked) +' disabled>' +
                '                    <label htmlFor="wronganswerc">' + response.data.wrongAnswerC +'</label>' +
                                        getText(response) +
                '    </div></div></div></div>';
                $('div#quiz-wrapper').append(html);
        })

        .fail(function () {
            Swal.fire('Ooops...', "Wystąpił błąd", 'error');
        })
    });

    function getText(response)
    {
        if(response.status == 'correct')
            return '<br><br><button class="btn btn-primary border-success align-items-center btn-success" type="button">Poprawna odpowiedź!';
        else if(response.status == 'wrong')
            return '<br><br><button class="btn btn-primary border-success align-items-center btn-danger" type="button">Zła odpowiedź!';
    }

    function getChecked(response, checked)
    {
        if(response == checked)
            return response + '" checked';
        else
            return response + '"';
    }
});
