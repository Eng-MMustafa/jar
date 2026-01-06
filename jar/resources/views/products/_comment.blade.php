<div class="review-item comment border-b border-gray-200 py-4">
    <div class="review-header flex items-start gap-3">
        <div class="reviewer-info flex items-center gap-3">
            <div class="reviewer-details">
                <div class="reviewer-name text-sm font-semibold">{{ $comment->user->name ?? 'المستخدم' }}</div>
                @if($comment->rating)
                    <div class="review-rating text-sm text-yellow-500">{!! str_repeat('★', $comment->rating) !!}{!! str_repeat('☆', 5 - $comment->rating) !!}</div>
                @endif
            </div>
            <img src="{{ asset($comment->user->avatar ?? 'images/avatar.png') }}" alt="{{ $comment->user->name ?? 'avatar' }}" class="reviewer-avatar w-10 h-10 rounded-full object-cover">
        </div>
        <div class="review-date text-xs text-gray-400 ml-auto">{{ $comment->created_at->format('d/m/Y') }}</div>
    </div>

    <div class="review-text mt-3 text-sm text-gray-700">{{ e($comment->body) }}</div>
</div>