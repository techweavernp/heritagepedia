@props(['details'])

<div id="quick-links-modal" class="bottom-sheet-modal">
    <div class="sheet-content">
        <div class="sheet-header">
            <h3>Quick Navigate</h3>
            <span class="close-sheet">&times;</span>
        </div>
        <ul class="quick-links-list">
            @foreach($details as $detail)
                <li><a href="#{{$detail->qlink_tag}}" class="quick-link-item">{{$detail->qlink_tag}}</a></li>
            @endforeach
        </ul>
    </div>
</div>