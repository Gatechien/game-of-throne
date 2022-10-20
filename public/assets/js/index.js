const quizz = {

    init: function() {
        console.log('Coucou');
        quizz.result();

    },

    result: function() {
        const button = document.querySelector("#result");
        button.addEventListener('click', quizz.calculResult)
    },

    calculResult: function() {
        debugger;
        for (let i = 1; i <= 24; i++) {
            let response = document.querySelector(`#reponse${[i]}`).value;
            console.log(response);

            
        }

    }
}

document.addEventListener('DOMContentLoaded', quizz.init);