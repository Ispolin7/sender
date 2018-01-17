<table class="table table-bordered table-responsive table-striped">
    <tr><td>Home Task Mail</td></tr>
    <tr>
        <td>
            @foreach($template as $item)
            {!!$item->content!!}
            @endforeach
            <p>%recipient.name% %recipient.name%</p>
        </td>
    </tr>
    <tr> <td>© 2018 Home Task Mai. All rights NOT reserved.</td></tr>
</table>