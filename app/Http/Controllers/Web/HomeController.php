<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    protected $view;
    protected $domain;


    public function __construct()
    {
        $this->view = 262362924;
        $this->domain = url('/');
    }


    public function home()
    {
        $view = $this->view;
        $domain = $this->domain;

        return view('welcome', compact('view', 'domain'));
    }

    public function ajax()
    {
        $serviceAccount = public_path('analtycs-343611-fa0fb357e395.json');

        $client = new \Google_Client();
        $client->setApplicationName("Realtime Analytics");
        $client->setAuthConfig($serviceAccount);
        $client->setScopes(['https://www.googleapis.com/auth/analytics.readonly']);
        $analytics = new \Google_Service_Analytics($client);
        if (isset($_GET['action'])) {
            $action = $_GET['action'];
            if ($action == 'pages') {
                echo $this->getActivePages($analytics);
            } elseif ($action == 'users') {
                echo $this->getActiveUsers($analytics);
            } elseif ($action == 'devices') {
                echo $this->getDevices($analytics);
            } elseif ($action == 'sources') {
                echo $this->getTrafficSources($analytics);
            } elseif ($action == 'countries') {
                echo $this->getCountries($analytics);
            } elseif ($action == 'os') {
                echo $this->getOS($analytics);
            } elseif ($action == 'browsers') {
                echo $this->getBrowser($analytics);
            }
        }
    }


    function getActivePages($analytics)
    {
        $optParams = array(
            'dimensions' => 'rt:pageTitle,rt:pagePath',
            'sort' => '-rt:activeVisitors',
            'max-results' => '16'
        );
        $result = $analytics
            ->data_realtime
            ->get('ga:' . $this->view, 'rt:activeVisitors', $optParams);
        $table = '';
        if ($result) {
            $rows = $result->getRows();
            if ($rows) {
                foreach ($rows as $row) {
                    $table .= '<tr class="open-link" data-link="' . $row[1] . '">';
                    $table .= '<td>' . htmlspecialchars($row[0], ENT_NOQUOTES) . '</td>';
                    $table .= '<td>' . htmlspecialchars($row[2], ENT_NOQUOTES) . '</td>';
                    $table .= '</tr>';
                }
            } else {
                $table .= '<tr><td colspan="2"><small>There is no data to view</small></td></tr>';
            }
            return $table;
        } else {
            return '<tr><td colspan="2"><small>There is no data to view</small></td></tr>';
        }
    }

    function getActiveUsers($analytics)
    {
        $active_users = $analytics
            ->data_realtime
            ->get('ga:' . $this->view, 'rt:activeVisitors');
        $active_users = (isset($active_users->rows[0][0])) ? $active_users->rows[0][0] : 0;
        return $active_users;
    }

    function getDevices($analytics)
    {
        $optParams = array(
            'dimensions' => 'rt:deviceCategory',
            'sort' => '-rt:activeVisitors'
        );
        $devices = $analytics
            ->data_realtime
            ->get('ga:' . $this->view, 'rt:activeVisitors', $optParams);
        $html = '';
        if ($devices->rows) {
            $total = 0;
            $class = array('warning', 'success', 'danger');
            foreach ($devices->rows as $row) {
                $total += $row[1];
            }
            $loop = 0;
            $html .= '<div class="progress_label">';
            foreach ($devices->rows as $row) {
                $percent = round(($row[1] / $total) * 100);
                $html .= '<div class="label label-' . $class[$loop] . '">';
                $html .= '<span>' . $row[0] . '</span>';
                $html .= '<span>' . $row[1] . '</span>';
                $html .= '</div>';
                $loop++;
            }
            $html .= '</div>';
            $loop = 0;
            $html .= '<div class="progress" style="width:100%!important">';
            foreach ($devices->rows as $row) {
                $html .= '<div class="progress-bar progress-bar-' . $class[$loop] . '" style="width:' . $percent . '%"></div>';
                $loop++;
            }
            $html .= '</div>';
        }
        return $html;
    }

    function getFormattedData($result)
    {
        $table = '';
        if ($result) {
            $rows = $result->getRows();
            if ($rows) {
                foreach ($rows as $row) {
                    $table .= '<tr>';
                    foreach ($row as $cell) {
                        $table .= '<td>' . htmlspecialchars($cell, ENT_NOQUOTES) . '</td>';
                    }
                    $table .= '</tr>';
                }
            } else {
                $table .= '<tr><td colspan="2"><small>There is no data to view</small></td></tr>';
            }
            return $table;
        } else {
            return '<tr><td colspan="2"><small>There is no data to view</small></td></tr>';
        }
    }

    function getTrafficSources($analytics)
    {
        $optParams = array(
            'dimensions' => 'rt:source',
            'sort' => '-rt:activeVisitors',
            'max-results' => 5
        );
        $result = $analytics
            ->data_realtime
            ->get('ga:' . $this->view, 'rt:activeVisitors', $optParams);
        return $this->getFormattedData($result);
    }

    function getCountries($analytics)
    {
        $optParams = array(
            'dimensions' => 'ga:country',
            'sort' => '-rt:activeVisitors',
            'max-results' => 10
        );
        $result = $analytics
            ->data_realtime
            ->get('ga:' . $this->view, 'rt:activeVisitors', $optParams);
        return $this->getFormattedData($result, 'Country', 'Users');
    }

    function getOS($analytics)
    {
        $optParams = array(
            'dimensions' => 'ga:operatingSystem',
            'sort' => '-rt:activeVisitors',
            'max-results' => 10
        );
        $result = $analytics
            ->data_realtime
            ->get('ga:' . $this->view, 'rt:activeVisitors', $optParams);
        return $this->getFormattedData($result, 'OS', 'Users');
    }

    function getBrowser($analytics)
    {
        $optParams = array(
            'dimensions' => 'ga:browser',
            'sort' => '-rt:activeVisitors',
            'max-results' => 10
        );
        $result = $analytics
            ->data_realtime
            ->get('ga:' . $this->view, 'rt:activeVisitors', $optParams);
        return $this->getFormattedData($result, 'Browser', 'Users');
    }

}
