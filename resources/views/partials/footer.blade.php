<div class="container">
    <div class="row mb-5">
        <div class="col">
            <h3>REEEP</h3>
            <p>{{ $footer->title }}</p>
            <div class="row">
                <div class="col">
                    <img src="{{ asset($footer->image_1) }}" class="img-fluid" alt="">
                </div>
                <div class="col">
                    <img src="{{ asset($footer->image_2) }}" class="img-fluid" alt="">
                </div>
            </div>
        </div>
        <div class="col">
            <h3>Contacts</h3>
            <ul type="none">
                <li>Email: {{ $location->email }}</li>
                <li>Website: {{ $location->website }}</li>
                <li>Tel: {{ $location->call }}</li>
            </ul>
        </div>
        <div class="col text-start">
            <h3>More Links</h3>
            <ul type="none">
                @foreach ($footmenu as $item)                    
                <li><a class="nav-link" href="{{ $item->slug }}">{{ $item->name }}</a></li>
                @endforeach
            </ul>
        </div>
    </div>
    <div class="social-links">
      @foreach ($socials as $item)
        <a href="{{ $item->url }}"><i class="{{ $item->type }}"></i></a>
      @endforeach
    </div>
</div>