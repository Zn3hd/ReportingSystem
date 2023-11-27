<!-- resources/views/mark-solved-unsolved.blade.php -->

<div class="mark-solved-unsolved">
    <form action="{{ route('report.markSolved', $report->id) }}" method="post">
        @csrf
        <button type="submit" style="background-color: #2196F3; color: white;">Mark as Solved</button>
    </form>
    <form action="{{ route('report.markUnsolved', $report->id) }}" method="post">
        @csrf
        <button type="submit" style="background-color: #800000; color: white;">Mark as Unsolved</button>
    </form>
</div>
