<div class="shariff" data-backend-url="{{ route('shariff') }}"
        {!! (isset($shariff_opts) && isset($shariff_opts['url'])) ? "data-url=\"$shariff_opts[url]\"" : 'data-url="' . Request::url() . '"'!!}
        {!! (isset($shariff_opts) && isset($shariff_opts['theme'])) ? "data-theme=\"$shariff_opts[theme]\"" : 'data-theme="grey"'!!}
        {!! (isset($shariff_opts) && isset($shariff_opts['orientation'])) ? "data-orientation=\"$shariff_opts[theme]\"" : 'data-orientation="horizontal"'!!}
        {!! (isset($shariff_opts) && isset($shariff_opts['services'])) ? "data-services=\"$shariff_opts[services]\"" : 'data-services="[&quot;whatsapp&quot;,&quot;facebook&quot;,&quot;twitter&quot;,&quot;googleplus&quot;,&quot;mail&quot;]"'!!}
        {!! (isset($shariff_opts) && isset($shariff_opts['title'])) ? "data-title=\"$shariff_opts[title]\"" : 'data-title="Here is something I wanted to share with you!"'!!}
></div>
