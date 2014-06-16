(function(a){
    
    a.fn.extend({
        
        // Crea los dados con el resultado aleatorio de la tirada
        
        tirar_dados: function() {
            
            var cuatro = a("#4").val();
            var seis = a("#6").val();
            var ocho = a("#8").val();
            var diez = a("#10").val();
            var doce = a("#12").val();
            var veinte = a("#20").val();
            
            
            
            a("#resultado > div").remove();
            
            if (isNaN(cuatro) || isNaN(seis) || isNaN(ocho) || isNaN(diez) || isNaN(doce) || isNaN(veinte))
            {
                alert("Eso no es un número humano!");
            }
            else
            {
                if (cuatro > 0 && cuatro != "")
                {
                    div = a("<div>D4: </div>");
                    for (i = 0; i < cuatro; i++)
                    {
                        dado = "<div id='dado'>" + (Math.floor(Math.random() * 4) + 1) + "</div>";
                        div.append(dado).css("display", "block");
                    }
                    
                    a("#resultado").append(div);
                }
                
                if (seis > 0 && seis != "")
                {
                    div = a("<div>D6: </div>");
                    for (i = 0; i < seis; i++)
                    {
                        dado = "<div id='dado'>" + (Math.floor(Math.random() * 6) + 1) + "</div>";
                        div.append(dado).css("display", "block");
                    }
                    
                    a("#resultado").append(div);
                }
                
                if (ocho > 0 && ocho != "")
                {
                    div = a("<div>D8: </div>");
                    for (i = 0; i < ocho; i++)
                    {
                        dado = "<div id='dado'>" + (Math.floor(Math.random() * 8) + 1) + "</div>";
                        div.append(dado).css("display", "block");
                    }
                    
                    a("#resultado").append(div);
                }
                
                if (diez > 0 && diez != "")
                {
                    div = a("<div>D10: </div>");
                    for (i = 0; i < diez; i++)
                    {
                        dado = "<div id='dado'>" + (Math.floor(Math.random() *10) + 1) + "</div>";
                        div.append(dado).css("display", "block");
                    }
                    
                    a("#resultado").append(div);
                }
                
                if (doce > 0 && doce != "")
                {
                    div = a("<div>D12: </div>");
                    for (i = 0; i < doce; i++)
                    {
                        dado = "<div id='dado'>" + (Math.floor(Math.random() * 12) + 1) + "</div>";
                        div.append(dado).css("display", "block");
                    }
                    
                    a("#resultado").append(div);
                }
                
                if (veinte > 0 && veinte != "")
                {
                    div = a("<div>D20: </div>");
                    for (i = 0; i < veinte; i++)
                    {
                        dado = "<div id='dado'>" + (Math.floor(Math.random() * 20) + 1) + "</div>";
                        div.append(dado).css("display", "block");
                    }
                    
                    a("#resultado").append(div);
                }
                
                a("#resultado > div").css("margin", "25px");
                
                a("#resultado #dado").css({"border":"1px solid black", "width":"30px", "height":"30px", "margin-top":"20px", "margin-right":"10px", "padding":"10px", "text-align":"center", "display":"inline"});
            }
            
            return this;
            
        },
        
        
        
        // Crea el contenedor y elementos necesarios para introducir la cantidad de dados
        // y el resultado
        
        mostrar_mesa: function(padre) {
            
            padre = padre || "body";
            var dados = new Array(4, 6, 8, 10, 12, 20);
            
            mesa = a("<div id='mesa'></div>");
            
            for (var i = 0; i < dados.length; i++)
            {
                mesa.append("<label>Dados de " + dados[i] + " caras: </label>");
                mesa.append("<input type='number' id='" + dados[i] + "' />");
                
                if (i % 2 != 0)
                {
                    mesa.append("<br />");
                }
            }
            
            mesa.append("<button id='lanzar'>Lanzar dados</button>");
            
            resultado = "<div id='resultado'><h4>RESULTADOS:</h4></div>";
            mesa.append(resultado);
            
            a(padre).append(mesa);
            
            
            a("#mesa, #resultado").each(function() {
                
                a(this).css({"border":"1px solid black", "padding":"20px"});
                
            });
            a("input").css("width", "50px");
            a("label").css({"border":"1px solid black", "width":"300px"});
            
            return this;
            
        },
        
    });
    
})(jQuery);
