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
                    div = a("<div><span>D4: </span></div>");
                    for (i = 0; i < cuatro; i++)
                    {
                        dado = "<div id='dado'>" + (Math.floor(Math.random() * 4) + 1) + "</div>";
                        div.append(dado).css("display", "block");
                    }
                    
                    a("#resultado").append(div);
                }
                
                if (seis > 0 && seis != "")
                {
                    div = a("<div><span>D6: </span></div>");
                    for (i = 0; i < seis; i++)
                    {
                        dado = "<div id='dado'>" + (Math.floor(Math.random() * 6) + 1) + "</div>";
                        div.append(dado).css("display", "block");
                    }
                    
                    a("#resultado").append(div);
                }
                
                if (ocho > 0 && ocho != "")
                {
                    div = a("<div><span>D8: </span></div>");
                    for (i = 0; i < ocho; i++)
                    {
                        dado = "<div id='dado'>" + (Math.floor(Math.random() * 8) + 1) + "</div>";
                        div.append(dado).css("display", "block");
                    }
                    
                    a("#resultado").append(div);
                }
                
                if (diez > 0 && diez != "")
                {
                    div = a("<div><span>D10: </span></div>");
                    for (i = 0; i < diez; i++)
                    {
                        dado = "<div id='dado'>" + (Math.floor(Math.random() *10) + 1) + "</div>";
                        div.append(dado).css("display", "block");
                    }
                    
                    a("#resultado").append(div);
                }
                
                if (doce > 0 && doce != "")
                {
                    div = a("<div><span>D12: </span></div>");
                    for (i = 0; i < doce; i++)
                    {
                        dado = "<div id='dado'>" + (Math.floor(Math.random() * 12) + 1) + "</div>";
                        div.append(dado).css("display", "block");
                    }
                    
                    a("#resultado").append(div);
                }
                
                if (veinte > 0 && veinte != "")
                {
                    div = a("<div><span>D20: </span></div>");
                    for (i = 0; i < veinte; i++)
                    {
                        dado = "<div id='dado'>" + (Math.floor(Math.random() * 20) + 1) + "</div>";
                        div.append(dado).css("display", "block");
                    }
                    
                    a("#resultado").append(div);
                }
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
            
            return this;
            
        },
        
    });
    
})(jQuery);
