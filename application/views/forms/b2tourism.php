
<div class="container" id="questionOne">
    <div class="progress">
        <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 33%"></div>
    </div>

    <hr>

    <form>
        <div class="form-group"> <!-- Radio group !-->
            <label class="control-label"> 1) Você está atualmente nos EUA com um status de visto válido (status de imigração dos EUA)? </label>
            <div class="radio">
            <label>
                <input type="radio" name="fav_foods" value="pizza">
                Sim
            </label>
            </div>
            <div class="radio">
            <label>
                <input type="radio"  name="fav_foods" value="hamburger">
                Não
            </label>
            </div>
        </div>		

        <div class="form-group"> <!-- Submit button !-->
            <div class="btn btn-primary " name="submit" type="submit" onclick="nextFormAction()">Próxima</div>
        </div>
    </form>
</div>


<div class="container" id="questionTwo">
    <div class="progress">
        <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 66%"></div>
    </div>
    <hr>
    <form>
        <div class="form-group"> <!-- Radio group !-->
            <label class="control-label"> 2) Deseja estender seu status de visto (status de imigração dos EUA)?</label>
            <div class="radio">
            <label>
                <input type="radio" name="fav_foods" value="pizza">
                Sim, quero estender meu status atual nos EUA
            </label>
            </div>
            <div class="radio">
            <label>
                <input type="radio"  name="fav_foods" value="hamburger">
                Não, quero, mudar meu status para um status de imigração diferente
            </label>
            </div>
            <div class="radio">
            <label>
                <input type="radio"  name="fav_foods" value="hamburger">
                Não, quero restabelecer meu status de estudante
            </label>
            </div>
        </div>		

        <div class="form-group"> <!-- Submit button !-->
            <div class="btn btn-primary " name="submit" type="submit" onclick="nextFormAction()">Próxima</div>
        </div>
    </form>
</div>


<div class="container" id="questionTree">
    <div class="progress">
        <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 90%"></div>
    </div>
    <hr>
    <form>
        <div class="form-group"> <!-- Radio group !-->
            <label class="control-label"> 3) Qual é o seu status atual de visto (status de imigração dos EUA)??</label>
            <div class="radio">
            <label>
                <input type="radio" name="fav_foods" value="pizza">
                Visto B-1/B-2 – Negócios/Turismo
            </label>
            </div>
            <div class="radio">
            <label>
                <input type="radio"  name="fav_foods" value="hamburger">
                Visto H-4 – Dependente de um portador de visto H1B
            </label>
            </div>
            <div class="radio">
            <label>
                <input type="radio"  name="fav_foods" value="hamburger">
                Visto L-2 – Dependente de um portador de visto L-1 
            </label>
            </div>
            <div class="radio">
            <label>
                <input type="radio"  name="fav_foods" value="hamburger">
                Visto TD – Dependente de um portador de visto TN
            </label>
            </div>
            <div class="radio">
            <label>
                <input type="radio"  name="fav_foods" value="hamburger">
                Visto O-3 – Dependente de um portador de visto O-1 ou O-2
            </label>
            </div>
            <div class="radio">
            <label>
                <input type="radio"  name="fav_foods" value="hamburger">
                Visto R-2 – Dependente de um portador de visto R-1
            </label>
            </div>
            <div class="radio">
            <label>
                <input type="radio"  name="fav_foods" value="hamburger">
                Visto P-4 – Dependente de um portador de visto P-1 ou P-2 ou P-3
            </label>
            </div>
            <div class="radio">
            <label>
                <input type="radio"  name="fav_foods" value="hamburger">
                Visto F-2 – Dependente de um portador de visto de estudante F-1 
            </label>
            </div>
            <div class="radio">
            <label>
                <input type="radio"  name="fav_foods" value="hamburger">
                Visto e Dependente
            </label>
            </div>

            <div class="radio">
            <label>
                <input type="radio"  name="fav_foods" value="hamburger">
                Nenhuma das acima
            </label>
            </div>
        </div>		

        <div class="form-group"> <!-- Submit button !-->
          <div class="btn btn-primary " name="submit" type="submit" onclick="nextFormAction()">Próxima</div>
        </div>
    </form>
</div>




<div class="container" id="SuccessMessage">
    <img src="<?php echo base_url() ?>" alt="">
</div>


