<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f0f2f5;
        }
        /* Custom scrollbar for better aesthetics */
        ::-webkit-scrollbar {
            width: 8px;
            height: 8px;
        }
        ::-webkit-scrollbar-track {
            background: #e2e8f0;
            border-radius: 10px;
        }
        ::-webkit-scrollbar-thumb {
            background: #94a3b8; 
            border-radius: 10px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: #64748b; 
        }
    </style>
</head>
<body class="min-h-screen flex flex-col md:flex-row bg-gray-100 p-4 sm:p-6 lg:p-8">

    <!-- Main Container -->
    <div class="flex flex-col md:flex-row w-full max-w-7xl mx-auto bg-white rounded-xl shadow-2xl overflow-hidden">

        <!-- Sidebar Navigation -->
        <aside class="w-full md:w-64 bg-gradient-to-br from-green-700 to-green-900 text-white p-4 rounded-t-xl md:rounded-l-xl md:rounded-tr-none shadow-lg flex-shrink-0">
            <div class="mb-6 text-center pt-4">
                <h2 class="text-3xl font-bold font-inter tracking-tight">Admin Panel</h2>
                <p class="text-sm text-green-200 mt-1">Welcome, <span id="sidebarUserName">Admin User</span>!</p>
            </div>
            <nav class="flex flex-col space-y-2">
                <!-- Navigation items will be dynamically populated/managed by JS -->
                <button data-view="dashboard" class="nav-button flex items-center space-x-3 p-3 rounded-md transition-all duration-200 font-medium font-inter bg-green-800 text-white shadow-md">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-layout-dashboard"><rect width="7" height="9" x="3" y="3" rx="1"/><rect width="7" height="5" x="14" y="3" rx="1"/><rect width="7" height="9" x="14" y="12" rx="1"/><rect width="7" height="5" x="3" y="16" rx="1"/></svg>
                    <span>Dashboard</span>
                </button>
                <button data-view="userManagement" class="nav-button flex items-center space-x-3 p-3 rounded-md transition-all duration-200 font-medium font-inter hover:bg-green-600 hover:text-green-100">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-users"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                    <span>User Management</span>
                </button>
                <button data-view="departmentManagement" class="nav-button flex items-center space-x-3 p-3 rounded-md transition-all duration-200 font-medium font-inter hover:bg-green-600 hover:text-green-100">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-building"><rect width="16" height="20" x="4" y="2" rx="2" ry="2"/><path d="M9 22v-4h6v4"/><path d="M8 6h.01"/><path d="M16 6h.01"/><path d="M16 10h.01"/><path d="M8 10h.01"/><path d="M8 14h.01"/><path d="M16 14h.01"/></svg>
                    <span>Department Management</span>
                </button>
                <button data-view="auditLogs" class="nav-button flex items-center space-x-3 p-3 rounded-md transition-all duration-200 font-medium font-inter hover:bg-green-600 hover:text-green-100">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-clipboard-list"><rect width="8" height="4" x="8" y="2" rx="1" ry="1"/><path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"/><path d="M12 11h4"/><path d="M12 16h4"/><path d="M8 11h.01"/><path d="M8 16h.01"/></svg>
                    <span>Fund Allocations</span>
                </button>
                <button data-view="auditLogs" class="nav-button flex items-center space-x-3 p-3 rounded-md transition-all duration-200 font-medium font-inter hover:bg-green-600 hover:text-green-100">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-clipboard-list"><rect width="8" height="4" x="8" y="2" rx="1" ry="1"/><path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"/><path d="M12 11h4"/><path d="M12 16h4"/><path d="M8 11h.01"/><path d="M8 16h.01"/></svg>
                    <span>Tax</span>
                </button>
                <button data-view="auditLogs" class="nav-button flex items-center space-x-3 p-3 rounded-md transition-all duration-200 font-medium font-inter hover:bg-green-600 hover:text-green-100">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-clipboard-list"><rect width="8" height="4" x="8" y="2" rx="1" ry="1"/><path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"/><path d="M12 11h4"/><path d="M12 16h4"/><path d="M8 11h.01"/><path d="M8 16h.01"/></svg>
                    <span>Audit Logs</span>
                </button>
                <button data-view="systemSettings" class="nav-button flex items-center space-x-3 p-3 rounded-md transition-all duration-200 font-medium font-inter hover:bg-green-600 hover:text-green-100">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-settings"><path d="M12.22 2h-.44a2 2 0 0 0-2 2v.18a2 2 0 0 1-1 1.73l-.43.25a2 2 0 0 1-2 0l-.15-.08a2 2 0 0 0-2.73.73l-.78 1.28a2 2 0 0 0 .73 2.73l.04.02a2 2 0 0 1 .97 2.18v.44a2 2 0 0 1-.97 2.18l-.04.02a2 2 0 0 0-.73 2.73l.78 1.28a2 2 0 0 0 2.73.73l.15-.08a2 2 0 0 1 2 0l.43.25a2 2 0 0 1 1 1.73V20a2 2 0 0 0 2 2h.44a2 2 0 0 0 2-2v-.18a2 2 0 0 1 1-1.73l.43-.25a2 2 0 0 1 2 0l.15.08a2 2 0 0 0 2.73-.73l.78-1.28a2 2 0 0 0-.73-2.73l-.04-.02a2 2 0 0 1-.97-2.18v-.44a2 2 0 0 1 .97-2.18l.04-.02a2 2 0 0 0 .73-2.73l-.78-1.28a2 2 0 0 0-2.73-.73l-.15.08a2 2 0 0 1-2 0l-.43-.25a2 2 0 0 1-1-1.73V4a2 2 0 0 0-2-2z"/><circle cx="12" cy="12" r="3"/></svg>
                    <span>System Settings</span>
                </button>
            </nav>
            <div class="mt-auto pt-4 border-t border-green-600">
                <button id="logoutButton" class="w-full flex items-center justify-center space-x-3 p-3 rounded-md bg-red-600 hover:bg-red-700 text-white font-medium font-inter transition-all duration-200 shadow-md">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-log-out"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/><polyline points="16 17 21 12 16 7"/><line x1="21" x2="9" y1="12" y2="12"/></svg>
                    <span>Logout</span>
                </button>
            </div>
        </aside>

        <!-- Main Content Area -->
        <main class="flex-1 p-6 md:p-8 overflow-y-auto">
            <!-- Content sections will be hidden/shown by JS -->

            <!-- Dashboard View -->
            <section id="dashboardView" class="view-section active-view">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <!-- Welcome Card -->
                    <div class="bg-gradient-to-r from-green-500 to-green-600 text-white p-6 rounded-xl shadow-lg col-span-full">
                        <h3 class="text-3xl font-bold mb-2 font-inter">Hello, <span id="dashboardUserName">Admin User</span>!</h3>
                        <p class="text-green-100 font-inter">Welcome to your Admin Dashboard. Here's a quick overview of the system.</p>
                    </div>

                    <!-- Total Users Card -->
                    <div class="bg-white p-6 rounded-xl shadow-lg border border-gray-200 flex flex-col items-center justify-center">
                        <h4 class="text-xl font-semibold text-gray-800 mb-2 font-inter">Total Users</h4>
                        <p class="text-5xl font-bold text-green-700 font-inter" id="totalUsersCount">0</p>
                        <p class="text-sm text-gray-500 font-inter mt-2">All registered users</p>
                    </div>

                    <!-- Total Departments Card -->
                    <div class="bg-white p-6 rounded-xl shadow-lg border border-gray-200 flex flex-col items-center justify-center">
                        <h4 class="text-xl font-semibold text-gray-800 mb-2 font-inter">Total Departments</h4>
                        <p class="text-5xl font-bold text-green-700 font-inter" id="totalDepartmentsCount">0</p>
                        <p class="text-sm text-gray-500 font-inter mt-2">Active departments</p>
                    </div>

                    <!-- Recent Activity Log Card -->
                    <div class="bg-white p-6 rounded-xl shadow-lg border border-gray-200 lg:col-span-1">
                        <h4 class="text-xl font-semibold text-gray-800 mb-4 font-inter">Recent Activity</h4>
                        <div id="recentActivityList">
                            <!-- Activities will be injected here by JS -->
                        </div>
                        <button data-target-view="auditLogs" class="switch-view-button mt-4 w-full bg-green-500 hover:bg-green-600 text-white py-2 px-4 rounded-lg shadow-md transition-all duration-200 font-inter">
                            View Full Audit Log
                        </button>
                    </div>

                    <!-- Quick Links Card -->
                    <div class="bg-white p-6 rounded-xl shadow-lg border border-gray-200 col-span-full md:col-span-2">
                        <h4 class="text-xl font-semibold text-gray-800 mb-4 font-inter">Quick Links</h4>
                        <div class="grid grid-cols-2 sm:grid-cols-3 gap-4">
                            <button data-target-view="userManagement" class="switch-view-button bg-green-500 hover:bg-green-600 text-white py-3 px-4 rounded-lg shadow-md flex flex-col items-center justify-center transition-all duration-200 font-inter">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-users mb-1"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                                Manage Users
                            </button>
                            <button data-target-view="departmentManagement" class="switch-view-button bg-green-500 hover:bg-green-600 text-white py-3 px-4 rounded-lg shadow-md flex flex-col items-center justify-center transition-all duration-200 font-inter">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-building mb-1"><rect width="16" height="20" x="4" y="2" rx="2" ry="2"/><path d="M9 22v-4h6v4"/><path d="M8 6h.01"/><path d="M16 6h.01"/><path d="M16 10h.01"/><path d="M8 10h.01"/><path d="M8 14h.01"/><path d="M16 14h.01"/></svg>
                                Manage Departments
                            </button>
                            <button data-target-view="systemSettings" class="switch-view-button bg-green-500 hover:bg-green-600 text-white py-3 px-4 rounded-lg shadow-md flex flex-col items-center justify-center transition-all duration-200 font-inter">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-settings mb-1"><path d="M12.22 2h-.44a2 2 0 0 0-2 2v.18a2 2 0 0 1-1 1.73l-.43.25a2 2 0 0 1-2 0l-.15-.08a2 2 0 0 0-2.73.73l-.78 1.28a2 2 0 0 0 .73 2.73l.04.02a2 2 0 0 1 .97 2.18v.44a2 2 0 0 1-.97 2.18l-.04.02a2 2 0 0 0-.73 2.73l.78 1.28a2 2 0 0 0 2.73.73l.15-.08a2 2 0 0 1 2 0l.43.25a2 2 0 0 1 1 1.73V20a2 2 0 0 0 2 2h.44a2 2 0 0 0 2-2v-.18a2 2 0 0 1 1-1.73l.43-.25a2 2 0 0 1 2 0l.15.08a2 2 0 0 0 2.73-.73l.78-1.28a2 2 0 0 0-.73-2.73l-.04-.02a2 2 0 0 1-.97-2.18v-.44a2 2 0 0 1 .97-2.18l.04-.02a2 2 0 0 0 .73-2.73l-.78-1.28a2 2 0 0 0-2.73-.73l-.15.08a2 2 0 0 1-2 0l-.43-.25a2 2 0 0 1-1-1.73V4a2 2 0 0 0-2-2z"/><circle cx="12" cy="12" r="3"/></svg>
                                System Settings
                            </button>
                            <button data-target-view="auditLogs" class="switch-view-button bg-green-500 hover:bg-green-600 text-white py-3 px-4 rounded-lg shadow-md flex flex-col items-center justify-center transition-all duration-200 font-inter">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-clipboard-list mb-1"><rect width="8" height="4" x="8" y="2" rx="1" ry="1"/><path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"/><path d="M12 11h4"/><path d="M12 16h4"/><path d="M8 11h.01"/><path d="M8 16h.01"/></svg>
                                View Audit Logs
                            </button>
                        </div>
                    </div>
                </div>
            </section>

            <!-- User Management View -->
            <section id="userManagementView" class="view-section hidden">
                <div class="bg-white p-6 rounded-xl shadow-lg border border-gray-200">
                    <h3 class="text-2xl font-semibold text-gray-800 mb-6 font-inter">User Management</h3>
                    <button class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-lg shadow-md transition-all duration-200 font-inter mb-4" onclick="alert('Redirect to Add New User Form');">
                        Add New User
                    </button>
                    <button class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-lg shadow-md transition-all duration-200 font-inter mb-4" onclick="alert('Redirect to Search User Form');">
                        Search User
                    </button>
                    <div id="userListTableContainer" class="overflow-x-auto">
                        <!-- User list table will be injected here by JS -->
                    </div>
                </div>
            </section>

            <!-- Department Management View -->
            <section id="departmentManagementView" class="view-section hidden">
                <div class="bg-white p-6 rounded-xl shadow-lg border border-gray-200">
                    <h3 class="text-2xl font-semibold text-gray-800 mb-6 font-inter">Department Management</h3>
                    <button class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-lg shadow-md transition-all duration-200 font-inter mb-4" onclick="alert('Redirect to Add New Department Form');">
                        Add New Department
                    </button>
                    <button class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-lg shadow-md transition-all duration-200 font-inter mb-4" onclick="alert('Redirect to Search Department Form');">
                        Search Department
                    </button>
                    <div id="departmentListTableContainer" class="overflow-x-auto">
                        <!-- Department list table will be injected here by JS -->
                    </div>
                </div>
            </section>

            <!-- Audit Logs View -->
            <section id="auditLogsView" class="view-section hidden">
                <div class="bg-white p-6 rounded-xl shadow-lg border border-gray-200">
                    <h3 class="text-2xl font-semibold text-gray-800 mb-6 font-inter">Audit Logs</h3>
                    <div id="fullAuditLogList">
                        <!-- Full audit log will be injected here by JS -->
                    </div>
                </div>
            </section>

            <!-- System Settings View -->
            <section id="systemSettingsView" class="view-section hidden">
                <div class="bg-white p-6 rounded-xl shadow-lg border border-gray-200">
                    <h3 class="text-2xl font-semibold text-gray-800 mb-6 font-inter">System Settings</h3>
                    <form id="systemSettingsForm" class="space-y-4">
                        <div>
                            <label for="appName" class="block text-sm font-medium text-gray-700 font-inter">Application Name</label>
                            <input type="text" id="appName" name="appName" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-green-500 focus:border-green-500 sm:text-sm font-inter" value="Citizen Portal" required>
                        </div>
                        <div>
                            <label for="adminEmail" class="block text-sm font-medium text-gray-700 font-inter">Admin Contact Email</label>
                            <input type="email" id="adminEmail" name="adminEmail" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-green-500 focus:border-green-500 sm:text-sm font-inter" value="admin@example.com" required>
                        </div>
                        <div>
                            <label for="maintenanceMode" class="flex items-center text-sm font-medium text-gray-700 font-inter">
                                <input type="checkbox" id="maintenanceMode" name="maintenanceMode" class="h-4 w-4 text-green-600 border-gray-300 rounded focus:ring-green-500 mr-2">
                                Enable Maintenance Mode
                            </label>
                        </div>
                        <button type="submit" class="w-full bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-lg shadow-md transition-all duration-200 font-inter">
                            Save Settings
                        </button>
                    </form>
                    <div id="systemSettingsMessage" class="mt-4 p-3 rounded-md text-sm font-inter hidden"></div>
                </div>
            </section>

        </main>
    </div>

    <script>
        // Mock User Data for Admin
        const adminUser = {
            name: 'Admin User',
            email: 'admin@example.com',
            userId: 'admin-001'
        };

        // Mock Data for Admin Dashboard
        const mockUsers = [
            { id: 1, username: 'jane.doe', role: 'CITIZEN', department: 'N/A', status: 'Active' },
            { id: 2, username: 'john.smith', role: 'DEPARTMENT_OFFICER', department: 'Registrations', status: 'Active' },
            { id: 3, username: 'alice.wong', role: 'STAFF', department: 'Finance', status: 'Active' },
            { id: 4, username: 'bob.jones', role: 'CITIZEN', department: 'N/A', status: 'Inactive' },
            { id: 5, username: 'charlie.brown', role: 'STAFF', department: 'Registrations', status: 'Active' },
        ];

        const mockDepartments = [
            { id: 101, name: 'Registrations', staffCount: 25 },
            { id: 102, name: 'Finance', staffCount: 18 },
            { id: 103, name: 'IT Support', staffCount: 10 },
            { id: 104, name: 'Public Relations', staffCount: 7 },
        ];

        const mockAuditLogs = [
            { id: 'log001', timestamp: '2024-07-31 10:30:00', user: 'admin-001', action: 'Created user: jane.doe', details: 'Role: CITIZEN' },
            { id: 'log004', timestamp: '2024-07-30 14:20:30', user: 'admin-001', action: 'Updated department: Finance', details: 'Description changed' },
            { id: 'log005', timestamp: '2024-07-29 11:05:00', user: 'alice.wong', action: 'Viewed payroll report', details: 'Report ID: PR202407' },
        ];

        // Function to switch between views
        function showView(viewId) {
            // Hide all view sections
            document.querySelectorAll('.view-section').forEach(section => {
                section.classList.add('hidden');
            });
            // Show the target view section
            document.getElementById(viewId).classList.remove('hidden');

            // Update active state for navigation buttons
            document.querySelectorAll('.nav-button').forEach(button => {
                if (button.dataset.view === viewId) {
                    button.classList.add('bg-green-800', 'text-white', 'shadow-md');
                    button.classList.remove('hover:bg-green-600', 'hover:text-green-100');
                } else {
                    button.classList.remove('bg-green-800', 'text-white', 'shadow-md');
                    button.classList.add('hover:bg-green-600', 'hover:text-green-100');
                }
            });
        }

        // Function to render dashboard summary data
        function renderDashboardSummary() {
            document.getElementById('totalUsersCount').textContent = mockUsers.length;
            document.getElementById('totalDepartmentsCount').textContent = mockDepartments.length;

            const activityList = document.getElementById('recentActivityList');
            activityList.innerHTML = '';
            if (mockAuditLogs.length === 0) {
                activityList.innerHTML = '<p class="text-gray-600 font-inter">No recent activity.</p>';
                return;
            }
            mockAuditLogs.slice(0, 5).forEach(log => { // Show top 5 recent activities
                activityList.innerHTML += `
                    <div class="py-2 border-b last:border-b-0 border-gray-100">
                        <p class="text-gray-700 font-inter text-sm">${log.action}</p>
                        <span class="text-xs text-gray-500 font-inter">${log.timestamp} by ${log.user}</span>
                    </div>
                `;
            });
        }

        // Function to render User List
        function renderUserList() {
            const container = document.getElementById('userListTableContainer');
            if (mockUsers.length === 0) {
                container.innerHTML = '<p class="text-gray-600 font-inter">No users found.</p>';
                return;
            }

            let tableHtml = `
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider font-inter">Username</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider font-inter">Role</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider font-inter">Department</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider font-inter">Status</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider font-inter">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
            `;
            mockUsers.forEach(user => {
                const statusClass = user.status === 'Active' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800';
                tableHtml += `
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 font-inter">${user.username}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 font-inter">${user.role}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 font-inter">${user.department}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-inter">
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full ${statusClass}">
                                ${user.status}
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium font-inter">
                            <button class="text-green-600 hover:text-green-900 ml-2" onclick="alert('Editing user: ${user.username}');">Edit</button>
                            <button class="text-red-600 hover:text-red-900 ml-2" onclick="alert('Deleting user: ${user.username}');">Delete</button>
                        </td>
                    </tr>
                `;
            });
            tableHtml += `
                    </tbody>
                </table>
            `;
            container.innerHTML = tableHtml;
        }

        // Function to render Department List
        function renderDepartmentList() {
            const container = document.getElementById('departmentListTableContainer');
            if (mockDepartments.length === 0) {
                container.innerHTML = '<p class="text-gray-600 font-inter">No departments found.</p>';
                return;
            }

            let tableHtml = `
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider font-inter">Department Name</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider font-inter">Staff Count</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider font-inter">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
            `;
            mockDepartments.forEach(dept => {
                tableHtml += `
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 font-inter">${dept.name}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 font-inter">${dept.staffCount}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium font-inter">
                            <button class="text-green-600 hover:text-green-900 ml-2" onclick="alert('Editing department: ${dept.name}');">Edit</button>
                            <button class="text-red-600 hover:text-red-900 ml-2" onclick="alert('Deleting department: ${dept.name}');">Delete</button>
                        </td>
                    </tr>
                `;
            });
            tableHtml += `
                    </tbody>
                </table>
            `;
            container.innerHTML = tableHtml;
        }

        // Function to render full Audit Log
        function renderFullAuditLog() {
            const container = document.getElementById('fullAuditLogList');
            container.innerHTML = '';
            if (mockAuditLogs.length === 0) {
                container.innerHTML = '<p class="text-gray-600 font-inter">No audit logs available.</p>';
                return;
            }
            mockAuditLogs.forEach(log => {
                container.innerHTML += `
                    <div class="p-4 mb-3 rounded-lg shadow-sm border border-gray-200 bg-gray-50">
                        <p class="text-gray-800 font-medium font-inter">${log.action}</p>
                        <span class="text-sm text-gray-500 font-inter">${log.timestamp} by User ID: ${log.user}</span>
                        <p class="text-sm text-gray-600 font-inter mt-1">Details: ${log.details}</p>
                    </div>
                `;
            });
        }

        // Event listener for navigation buttons
        document.addEventListener('DOMContentLoaded', () => {
            // Set user name in sidebar and dashboard
            document.getElementById('sidebarUserName').textContent = adminUser.name;
            document.getElementById('dashboardUserName').textContent = adminUser.name;

            // Add event listeners to sidebar navigation buttons
            document.querySelectorAll('.nav-button').forEach(button => {
                button.addEventListener('click', (event) => {
                    const viewId = event.currentTarget.dataset.view + 'View'; // Append 'View' to match section IDs
                    showView(viewId);

                    // Render content specific to the view when it's activated
                    if (viewId === 'userManagementView') {
                        renderUserList();
                    } else if (viewId === 'departmentManagementView') {
                        renderDepartmentList();
                    } else if (viewId === 'auditLogsView') {
                        renderFullAuditLog();
                    }
                    // Dashboard summary is rendered initially
                });
            });

            // Add event listeners to quick action buttons on dashboard
            document.querySelectorAll('.switch-view-button').forEach(button => {
                button.addEventListener('click', (event) => {
                    const viewId = event.currentTarget.dataset.targetView + 'View';
                    showView(viewId);

                    // Render content specific to the view when it's activated
                    if (viewId === 'userManagementView') {
                        renderUserList();
                    } else if (viewId === 'departmentManagementView') {
                        renderDepartmentList();
                    } else if (viewId === 'auditLogsView') {
                        renderFullAuditLog();
                    }
                });
            });

            // Handle System Settings form submission
            document.getElementById('systemSettingsForm').addEventListener('submit', function(event) {
                event.preventDefault(); // Prevent default form submission
                const appName = document.getElementById('appName').value;
                const adminEmail = document.getElementById('adminEmail').value;
                const maintenanceMode = document.getElementById('maintenanceMode').checked;
                const messageDiv = document.getElementById('systemSettingsMessage');

                // Simulate API call
                setTimeout(() => {
                    messageDiv.classList.remove('hidden', 'bg-red-100', 'text-red-800');
                    messageDiv.classList.add('bg-green-100', 'text-green-800');
                    messageDiv.textContent = `System settings updated successfully!`;
                    // In a real app, you'd send this data to your Laravel backend via AJAX/Fetch
                    console.log('Updated System Settings:', { appName, adminEmail, maintenanceMode });
                }, 500);
            });

            // Handle logout button click
            document.getElementById('logoutButton').addEventListener('click', () => {
                alert('Logged out successfully!'); // Replace with actual logout logic (e.g., redirect to login page)
                // window.location.href = '/logout'; // Example redirect
            });

            // Initial rendering of dashboard content
            renderDashboardSummary();

            // Show dashboard view by default
            showView('dashboardView');
        });
    </script>
</body>
</html>
