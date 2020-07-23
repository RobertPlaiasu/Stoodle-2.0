<style>
    body{
        color: #0a0a0a;
    }
    .text-center{
        text-align: center !important;
    }

    .container{
        max-width: 1200px;
        margin: 0 auto;
        padding: 2em;
    }

    .title-1{
        font-size: 1.75rem;
        font-weight: 800;
    }

    .text-muted{
        color: #718096;
    }
</style>
<div class="container text-center">
    <div class="title-1">Familia Stoodle</div>

    @foreach ($introLines as $line)
    {{ $line }}
    @endforeach

    {{-- Action Button --}}
    @isset($actionText)
    <?php
        switch ($level) {
            case 'success':
            case 'error':
                $color = $level;
                break;
            default:
                $color = 'primary';
        }
    ?>
    @component('mail::button', ['url' => $actionUrl, 'color' => $color])
        {{ $actionText }}
    @endcomponent
    @endisset

    <small class="text-muted"> * Ai respectul nostru pentru ca citesti asta. </small>
</div>