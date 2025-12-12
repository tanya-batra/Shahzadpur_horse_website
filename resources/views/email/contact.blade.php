<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>New Contact Form Submission</title>
</head>
<body style="font-family: 'Inter', sans-serif; background-color:#f8f9fa; margin:0; padding:0;">
  <table align="center" width="600" cellpadding="0" cellspacing="0" style="background:#fff; border-radius:10px; box-shadow:0 0 15px rgba(0,0,0,0.1); overflow:hidden; margin-top:30px;">
    <tr>
      <td style="background:#d4af37; color:#fff; padding:20px; text-align:center; font-size:24px; font-weight:bold;">
        New Contact Form Submission
      </td>
    </tr>
    <tr>
      <td style="padding:30px; color:#333;">
        <h3 style="color:#d4af37;">Contact Details</h3>
        <p><strong>Name:</strong> {{ $contact->name }}</p>
        <p><strong>Email:</strong> {{ $contact->email }}</p>
        <p><strong>Phone:</strong> {{ $contact->phone }}</p>

        <h3 style="color:#d4af37;">Message</h3>
        <p style="background:#f0f0f0; padding:15px; border-radius:5px;">{{ $contact->message }}</p>
      </td>
    </tr>
    <tr>
      <td style="background:#f8f9fa; text-align:center; padding:15px; font-size:12px; color:#888;">
        &copy; 2024 Shahjadpur Stables. All rights reserved.
      </td>
    </tr>
  </table>
</body>
</html>
