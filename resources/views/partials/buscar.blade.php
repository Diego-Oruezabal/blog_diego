<div class="search__box">
        <div class="container-fluid">
            <div class="row">
                <div class="m-auto col-lg-6 col-md-8 col-sm-11">
                    <div class="search__content ">
                        <button type="button" class="search__box-btn-close">
                            <i class="bi bi-x-lg"></i>
                        </button>
                        <form class="search__form" action="{{ route('blog.index') }}" method="GET">
                            <input type="search" name="search" class="search__form-input" placeholder="Buscar en el blog..." value="{{ request('search') }}">
                            <button type="submit" class="search__form-btn-search">Buscar</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
