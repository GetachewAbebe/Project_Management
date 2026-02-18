<html xmlns:o='urn:schemas-microsoft-com:office:office' xmlns:w='urn:schemas-microsoft-com:office:office:word' xmlns='http://www.w3.org/TR/REC-html40'>
<head><meta charset="utf-8"><title>Evaluation Summary Report</title>
<style>
    table { border-collapse: collapse; width: 100%; }
    th, td { border: 1px solid black; padding: 8px; font-family: 'Times New Roman', serif; font-size: 11pt; }
    th { background-color: #f2f2f2; font-weight: bold; text-align: center; }
    .title { font-size: 16pt; font-weight: bold; text-align: center; margin-bottom: 20px; }
</style>
</head>
<body>
    <div class="title">Bio and Emerging Technology Institute<br>Evaluation Summary Report - {{ date('Y-m-d') }}</div>
    
    <div style="margin-bottom: 20px; font-family: 'Times New Roman', serif; font-size: 11pt; line-height: 1.5; color: #000;">
        <p>
            Currently, the institute is overseeing a total of <strong>{{ $stats['total'] }}</strong> research initiatives. Out of these, <strong>{{ $stats['evaluated'] }}</strong> projects have undergone the formal evaluation process by our expert panel, while <strong>{{ $stats['unevaluated'] }}</strong> initiatives are currently awaiting evaluation as per the institutional registry.
        </p>
        <p>
            From the evaluated initiatives, <strong>{{ $stats['accepted'] }}</strong> projects have successfully met the institutional quality standards with an average score above 70%, while <strong>{{ $stats['unaccepted'] }}</strong> projects have been categorized as unaccepted due to performance results below the required threshold.
        </p>
    </div>

    <table>
        <thead>
            <tr>
                <th rowspan="2">No.</th>
                <th rowspan="2">Directorate</th>
                <th rowspan="2">Principal investigator</th>
                <th rowspan="2">Project title</th>
                <th colspan="2">Evaluation score from 100</th>
                <th rowspan="2">Average</th>
                <th rowspan="2">Remark</th>
                <th rowspan="2">Evaluator Comments</th>
            </tr>
            <tr>
                <th>Evaluator 1</th>
                <th>Evaluator 2</th>
            </tr>
        </thead>
        <tbody>
            @foreach($projects as $project)
                @php
                    $evals = $project->evaluations->sortBy('created_at')->values();
                    $score1 = $evals->get(0)?->total_score ?? '-';
                    $score2 = $evals->get(1)?->total_score ?? '-';
                    
                    $comments = $evals->map(function($e, $index) {
                        return "Evaluator " . ($index + 1) . ": " . ($e->comments ?? 'No comment');
                    })->implode('; ');

                    $average = '-';
                    if (is_numeric($score1) && is_numeric($score2)) {
                        $average = ($score1 + $score2) / 2;
                    } elseif (is_numeric($score1)) {
                        $average = $score1;
                    }

                    $remark = 'Unevaluated';
                    if ($evals->count() > 0) {
                        if (is_numeric($average)) {
                            $remark = $average >= 70 ? 'Accepted' : 'Unaccepted';
                        } else {
                            $remark = 'Pending';
                        }
                    }
                @endphp
                <tr>
                    <td style="text-align: center;">{{ $loop->iteration }}</td>
                    <td>{{ $project->directorate?->name }}</td>
                    <td>{{ $project->pi?->full_name }}</td>
                    <td>{{ $project->research_title }}</td>
                    <td style="text-align: center;">{{ is_numeric($score1) ? round($score1, 1) : $score1 }}</td>
                    <td style="text-align: center;">{{ is_numeric($score2) ? round($score2, 1) : $score2 }}</td>
                    <td style="text-align: center; font-weight: bold;">{{ is_numeric($average) ? round($average, 1) : $average }}</td>
                    <td>{{ $remark }}</td>
                    <td>{{ $comments }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
