<x-mail::message>
# Secure Institutional Access Invitation

Dear **{{ $invitation->employee->full_name }}**,

As part of our commitment to institutional research excellence and digital governance, you have been enrolled as a **Director** in the **{{ config('app.name') }}**.

To manage your directorate's research portfolio and projects, please complete your secure account registration by establishing your private institutional password.

<x-mail::button :url="route('register.invited', ['token' => $invitation->token])">
Establish Secure Credentials
</x-mail::button>

> [!IMPORTANT]
> This registration link is unique to you and will expire in **48 hours**. Please keep your credentials confidential.

If you did not expect this invitation, please contact the CSIS Department immediately.

Institutional Regards,<br>
**The CSIS Team**<br>
{{ config('app.name') }}
</x-mail::message>
