<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>New Blog Notification</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f6f6f6; padding: 20px; margin: 0;">
<div style="max-width: 600px; margin: auto; background-color: #ffffff; padding: 30px; border-radius: 10px; box-shadow: 0 0 10px rgba(0,0,0,0.05);">
    <h2 style="color: #333333; margin-top: 0;">📰 A New Blog Has Been Published!</h2>

    <p style="margin-bottom: 15px;">
        <strong>Title:</strong>
        <a href="{{ route('home') }}" style="color: #1a73e8; text-decoration: none;">
            {{ $blog->title }}
        </a>
    </p>

    <p style="margin-bottom: 15px;">
        <strong>Summary:</strong>
        {{ $blog->subtitle ?? 'N/A' }}
    </p>

    <p style="margin-bottom: 10px;"><strong>Description:</strong></p>
    <p style="margin-bottom: 20px;">{!! $blog->description !!}</p>

    @if($blog->image)
        <p style="text-align: center; margin-bottom: 20px;">
            <img src="{{ $message->embed(public_path($blog->image)) }}"
                 alt="Blog Image" style="max-width: 100%; border-radius: 5px;">
        </p>
    @endif

    <p style="text-align: center; margin-top: 30px;">
        🔥
        <a href="{{ route('home') }}" style="display: inline-block; padding: 10px 20px; background-color: #1a73e8; color: #ffffff; text-decoration: none; border-radius: 5px;">
            Visit our website to get the latest updates!
        </a>
    </p>
</div>
</body>
</html>
