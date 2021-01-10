
<div class= 'jumbotron bg-light'>

        <!--ADICIONAR NOVAS MOEDAS AQUI COM O CÓDIGO DA URL-->

        <div class='rows-1 text-dark'>
        <form required action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="GET"><!--FORM-->
        <label class='btn btn-info'><!--GET MOEDAS--> 
        <input type='checkbox' name='coin[]' value='USD-BRL'>  Dolar Americano
        </label>
        <label class='btn btn-info'>  
        <input type='checkbox' name='coin[]' value='EUR-BRL'>  Euro
        </label>
        <label class='btn btn-info'><!--GET MOEDAS--> 
        <input type='checkbox' name='coin[]' value='GBP-BRL'>  Libra Esterlina
        </label>

        </label>
        <label class='btn btn-info'><!--GET MOEDAS--> 
        <input type='checkbox' name='coin[]' value='JPY-BRL'>  Iene Japonês
        </label>
            
            <label class='btn btn-info'>  
            <input type='checkbox' name='coin[]' value='BTC-BRL'>  Bitcoin
            </label><!--GET MOEDAS-->
        
    </div>
        <div class ='mb-3'>
            
            <label class='form-label text-dark'>Digite o valor em reais:</label>
            <input type='number' class='form-control'step="0.01" min="0" required name='valor' placeholder="valor">
            
        </div>
    <?php
    if(isset($resultado)){
       
        echo "<div class=' jumbotron mb-3 text-black d-inline-flex'>
        <p class='d-flex text-dark' >".$resultado."</p><!-- EXIBIÇÃO DA RESPOSTA -->
    </div>";
    }
    echo $mensagem;
    ?>
        
        <p class='text-dark'></p>
        <button type='submit' class='btn btn-info'>Converter</button>
        </form><!--FORM-->
 
</div>

