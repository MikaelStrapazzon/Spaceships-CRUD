@props([
    'thead' => '',
    'tbody' => '',
])

<div class="table-responsive">
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                {{-- Example: <th scope="col">ID</th> --}}
                {{ $thead }}
            </tr>
        </thead>

        <tbody class="align-middle text-break">
            {{--Example:
                <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                </tr>
            --}}
            {{ $tbody }}
        </tbody>
    </table>
</div>
