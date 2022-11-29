<h2>События</h2>
<form class="row g-3" m-3 action="/events" method="POST">
            @csrf
            <label for="events" class="form-label">События</label>
            <input type="text" class="form-control" id="events">

        </form>
        <table class="table-primary">
            @foreach ($events as $event)
            <tr class="table-primary">
                <td class="table-primary"></td>
                <td>
                    <form action="/event/{{ $event->id }}" method="POST">
                        @csrf
                        @method('delete')
 
                </form>
                </td>
            </tr>
            @endforeach
        </table>