<script>
    movieDB.getMovies(BASE_URL+POP_SERIAL+API_KEY_URL, null)
    movieDB.getMovies(BASE_URL+POP_SERIAL+API_KEY_URL+"&page=2", null)
</script>
<div class="container mt-3 mb-1 pt-3 pb-3 rounded-2 mineHeader">
    <div class="border-danger border-bottom">
        <h1>List of Serials popular this week</h1>
        <!--<p>Looking for a specific serial? Make it easier with our filter. </p>
        <div class="row justify-content-evenly pb-1 mx-auto">
            <div class="col-md-3 p-1">
                <select class="form-select text-bg-dark customSelect" aria-label="ChooseGenre">
                    <option selected>Choose genre</option>
                    <option value="1">Action</option>
                    <option value="2">Fantasy</option>
                    <option value="3">Drama</option>
                </select>
            </div>

            <div class="col-lg-2 p-1">
                <select class="form-select text-bg-dark customSelect" aria-label="ChooseYear">
                    <option selected>Choose from year </option>
                    <option value="1">2022</option>
                    <option value="2">2021</option>
                    <option value="3">2020</option>
                </select>
            </div>

            <div class="col-lg-2 p-1">
                <select class="form-select text-bg-dark customSelect" aria-label="ChooseYear">
                    <option selected>Choose to year</option>
                    <option value="1">2022</option>
                    <option value="2">2021</option>
                    <option value="3">2020</option>
                </select>
            </div>

            <div class="col-md-3 p-1">
                <select class="form-select text-bg-dark customSelect" aria-label="ChooseProgress">
                    <option selected>Choose progress</option>
                    <option value="1">All</option>
                    <option value="2">In Production</option>
                    <option value="3">Production end</option>
                </select>
            </div>

            <div class="col-lg-2 p-1">
                <a class="btn btn-outline-danger me-2 text-white " href="?c=movie&a=serials">Filter reset</a>
            </div>
        </div>-->
    </div>
</div>
<div class="row justify-content-evenly" id="sugestedMoviesSerials">

</div>