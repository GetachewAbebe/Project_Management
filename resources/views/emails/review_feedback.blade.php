<x-mail::message>
# Scientific Feedback Confirmation

Dear **{{ $feedback['full_name'] }}**,

Thank you for contributing your insights to the **8th National Research Review**. Your feedback is vital in our mission to transform biological and emerging technology research in Ethiopia.

### Submission Summary
- **Organization:** {{ $feedback['organization'] ?? 'Not Specified' }}
- **Role:** {{ $feedback['role'] ?? 'Participant' }}
- **Event Rating:** {{ $feedback['event_rating'] }}/5
- **Technical Discourse:** {{ $feedback['technical_rating'] }}/5
- **Logistics & Organization:** {{ $feedback['logistics_rating'] }}/5

### Your Comments
@if($feedback['comments'])
*{{ $feedback['comments'] }}*
@else
*No additional comments provided.*
@endif

We have officially recorded your recommendations. They will be synthesized and presented to the institutional steering committee to guide future excellence.

@if($feedback['future_attendance'] == 'Yes')
We look forward to seeing you at the **9th National Research Review**!
@endif

<x-mail::button :url="config('app.url') . '/national-review-2026'">
Visit Review Hub
</x-mail::button>

Best regards,

**Bio and Emerging Technology Institute (BETIn)**  
Transforming Ideas into Impacts
</x-mail::message>
