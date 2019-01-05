var dir = "/";
var shell_history = [];
var shell_history_idx = -1;

function processCmd(cmd) {
    var args = cmd.split(' ').filter(function(i) {
        return i
    })
    console.log(args);

    if (args[0] == "help")
        return `<pre class="leet_text" style="font-size:15px;">Benvenuti nella nosta pagina!
I Comandi Disponibili Sono:
    help            mostra questa pagina di aiuto
    pwd             print current dir
    connect         i nostri social
    hello + name    print hello
    
</pre>`;


    else if (args[0] == "pwd") {
        return '<pre class="leet_text" style="font-size:15px;">' + dir + '</pre>';
    } else if (args[0] == "hello") {
        if (args[1] != undefined)
            return '<pre class="leet_text" style="font-size:15px;">' + "Ciao " + args[1] + '</pre>';
        else return '<pre class="leet_text" style="font-size:15px;">' + "Dimmi il tuo nome " + '</pre>';
    } else if (args[0] == "whoami") {
        return `<img class='propic' src='http://www.giornalepop.it/wp-content/uploads/2017/06/GoEIf12-1100x400.jpg'><pre class="leet_text" style="font-size:15px;">Bei Culi</pre>`;
    } else if (args[0] == "connect") {
        return `<div class="connect_div">
    <a href="https://www.facebook.com/valerio.montagliani1" class="social_button">
        <img src="img/fb.png" style="width: 50px; height: 50px;">
    </a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <a href="AggiungiIlNostroGithub" class="social_button">
        <img src="img/git.png" style="width: 50px; height: 50px;">
    </a>&nbsp;&nbsp;&nbsp;&nbsp;
    <a href="https://twitter.com/lucatomei1995" class="social_button">
        <img src="img/tw.png" style="width: 50px; height: 50px;">
    </a>
</div>`;
    }
    /*
    else if(args[0] == "weather"){
        var html = "";
             $('#submitWeather').click(function(){
        var city = $("#city").val();
        if(city != ''){
            $.ajax({
                url: 'http://api.openweathermap.org/data/2.5/weather?q=' + city + "&units=metric" + "&APPID=c49f2a5b07ce03250befb407c4410be3",
                type: "GET",
                dataType: "json",
                success: function(data){

                      // you gave the DIV that you want to display the weather information in "show", so that's where this is going:
                        html = "<p>" + "Meteo a "+data.name+"</p>";
                        data.weather.forEach(function(city) {
                            html += "\n"+"<p><img src='http://openweathermap.org/img/w/"+city.icon+".png'>"+city.description+"</p>";
                        });

                        //$("#show").html(html); 
                       
                }
            });

        } else {
            $("#error").html('field cannot be empty');
        }
    });
        var output = "<div>" +
                    "<div class=\"row form-group form-inline\" id=\"rowDiv\">"+
                    "<input type=\"text\" name=\"city\" id=\"city\" class=\"form-control\">"+
                    "<button id=\"submitWeather\" class=\"btn btn-primary\">Search City</button>"+          
                    "</div>"+
                    "<div id=\"show\">     </div>";
                    
        return output;
    } 
    */
    else return '<pre class="leet_text" style="font-size:15px;">' + $("<p/>").text(cmd).html() + ": command not found</pre>";

}

/*window.setInterval(function() {   // mi porta alla fine del div sempre
  var elem = document.getElementById('data');
  elem.scrollTop = elem.scrollHeight;
}, 100);
*/
$(document).ready(function() {

    $('#cmd_box').keypress(function(e) {
        var code = e.keyCode || e.which;
        if (code == 13) { //enter
            var cmd = $('#cmd_box').val();
            $('#cmd_box').val('');
            $('<div class="leet_text" style="font-size:15px;"><font style="color: #FF0000">$</font> ' + $("<p/>").text(cmd).html() + '</div>').insertBefore("#input_div");
            cmd = cmd.trim();
            if (cmd != "") {
                $(processCmd(cmd)).insertBefore("#input_div");
                shell_history.push(cmd);
                shell_history_idx = shell_history.length - 1;
            }
            
            var elem = document.getElementById('data');
            elem.scrollTop = elem.scrollHeight;
        } else if (code == 38) { //freccia in su

            if (shell_history.length > 0 && shell_history_idx >= 0) {
                $('#cmd_box').val(shell_history[shell_history_idx--]);
            }
        } else if (code == 40) { //freccia in giù
            if (shell_history.length > 0 && shell_history_idx < shell_history.length) {
                if (shell_history.length == shell_history.length - 1)
                    $('#cmd_box').val('');
                else
                    $('#cmd_box').val(shell_history[++shell_history_idx]);
            }
        } 

    });
});