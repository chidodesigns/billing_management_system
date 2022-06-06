<!-- Modal -->

<div class="modal fade" id="exampleModal{{ $record->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Are you sure?</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                This will delete the Service Payment Record Domain: {{ $record->domain }} and all associated data.

                This action cannot be undone.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-sm btn-danger" onclick="event.preventDefault();
                            document.getElementById('delete-service-payments-form-{{ $record->id }}').submit()">
                    Delete Service Payment Record
                </button>
                <form id="delete-service-payments-form-{{ $record->id }}"
                    action="{{ route('admin.service-payments.destroy', $record->id) }}" method="POST"
                    style="display: none;">
                    @csrf
                    @method('DELETE')
                </form>
            </div>
        </div>
    </div>
</div>
