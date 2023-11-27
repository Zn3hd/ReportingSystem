<!DOCTYPE html>
<html lang="en">
<head>
    @include('admin.adminCss ')
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            background-color: #f4f4f4;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 15px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .verified {
            color: #4CAF50;
            background-color: #e7f6e7;
        }

        .unverified {
            color: #D32F2F;
            background-color: #f9e6e6;
        }

        button {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 8px 12px;
            border-radius: 4px;
            text-align: center;
            text-decoration: none;
            font-size: 14px;
            cursor: pointer;
            transition: background-color 0.3s;
            margin-right: 10px;
        }

        button.reject {
            background-color: #D32F2F;
        }

        button:hover {
            background-color: #45a049;
        }

        footer {
            text-align: center;
            padding: 20px;
            background-color: #333;
            color: white;
        }
    </style>
</head>
<body>
    @include('admin.adminNavbar')
    @include('admin.adminSettings')
    @include('admin.adminSidebar')

    <table>
        <thead>
            <tr>
                <th>Report Type</th>
                <th>Details</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="verified">Verified Reports</td>
                <td>
                    @foreach ($verifiedReports as $report)
                        @include('_report-details', ['report' => $report])
                    @endforeach
                </td>
                <td>
                    @foreach ($verifiedReports as $report)
                        @if ($report->verified)
                            @include('mark-solved-unsolved', ['report' => $report])
                        @endif
                    @endforeach
                </td>
            </tr>
            <tr>
                <td class="unverified">Unverified Reports</td>
                <td>
                    @foreach ($unverifiedReports as $report)
                        @include('_report-details', ['report' => $report])
                    @endforeach
                </td>
                <td></td>
            </tr>
            <tr>
                <td class="verified">Verified Reports (with Solved/Unsolved buttons)</td>
                <td>
                    @foreach ($verifiedReports as $report)
                        @include('_report-details', ['report' => $report])
                    @endforeach
                </td>
                <td>
                    @foreach ($verifiedReports as $report)
                        @if ($report->verified)
                            @include('mark-solved-unsolved', ['report' => $report])
                        @endif
                    @endforeach
                </td>
            </tr>
        </tbody>
    </table>

    <footer>
        <p>&copy; 2023 Your Company</p>
    </footer>

    @include('admin.adminJs')
</body>
</html>
