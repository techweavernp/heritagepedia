@if(auth()->user()->status == \App\Enums\UserStatusEnum::PENDING)
    <div style="background: rgba(220, 38, 38, 0.1); color: #dc2626; padding: 12px 24px; border-radius: 8px; border: 1px solid #dc2626; box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1); font-weight: 500; margin-bottom: 16px;">
        ⚠️ Your data is under verification.
    </div>
@endif
