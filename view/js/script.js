document.addEventListener("DOMContentLoaded", function(){
    //Função para obter a data e hora atual no formato 'yyyy-MM-ddTHH:mm'
    function getCurrentDateTime(){
        const now = new Date();

        //Obtemos ano, mês, dia, hora e minutos
        const year = now.getFullYear();
        const month = String(now.getMonth() + 1).padStart(2, '0');
        const day = String(now.getDate()).padStart(2, '0');
        const hours = String(now.getHours()).padStart(2, '0');
        const minutes = String(now.getMinutes()).padStart(2, '0');

        //Formatamos a data e a hora no formato 'yyyy-MM-ddTHH:mm'
        return `${year}-${month}-${day}T${hours}:${minutes}`;
    }
    //Selecionamos o input e definimos o valor para a data e hora atual
    const datetimeInput = document.getElementById('datetime');
    datetimeInput.value = getCurrentDateTime();
});