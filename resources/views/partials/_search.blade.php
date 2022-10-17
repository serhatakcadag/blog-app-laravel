<div class="col-lg-4">
    <!-- Search widget-->
    <div class="card mb-4">
        <div class="card-header">Search</div>
        <div class="card-body">
            <form action="/" method="GET">
            <div class="input-group">
                @isset($old)
                <input class="form-control" type="text" placeholder="Enter search term..." aria-label="Enter search term..." name="search" value="{{ $old }}" aria-describedby="button-search" />
                @else
                <input class="form-control" type="text" placeholder="Enter search term..." aria-label="Enter search term..." name="search" aria-describedby="button-search" />
                @endisset
                <button class="btn btn-primary" id="button-search" type="submit">Go!</button>
            </div>
            </form>
        </div>
    </div>
    <!-- Categories widget-->
</div>
