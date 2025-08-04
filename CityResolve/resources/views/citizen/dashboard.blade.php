<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Citizen Dashboard</title>
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
                <h2 class="text-3xl font-bold font-inter tracking-tight">Citizen Portal</h2>
                <p class="text-sm text-green-200 mt-1">Welcome, <span id="sidebarUserName">Jane Doe</span>!</p>
            </div>
            <nav class="flex flex-col space-y-2">
                
                <!-- Navigation items will be dynamically populated/managed by JS -->
                <button data-view="dashboard" class="nav-button flex items-center space-x-3 p-3 rounded-md transition-all duration-200 font-medium font-inter bg-green-800 text-white shadow-md">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-home"><path d="m3 9 9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>
                    <span>Dashboard</span>
                </button>
                <button data-view="applyService" class="nav-button flex items-center space-x-3 p-3 rounded-md transition-all duration-200 font-medium font-inter hover:bg-green-600 hover:text-green-100">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-plus-circle"><circle cx="12" cy="12" r="10"/><path d="M8 12h8"/><path d="M12 8v8"/></svg>
                    <span>Apply for Service</span>
                </button>
                <button data-view="taxPayment" class="nav-button flex items-center space-x-3 p-3 rounded-md transition-all duration-200 font-medium font-inter hover:bg-green-600 hover:text-green-100">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-dollar-sign"><line x1="12" x2="12" y1="2" y2="22"/><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/></svg>
                    <span>Pay Taxes</span>
                </button>
                <button data-view="notifications" class="nav-button flex items-center space-x-3 p-3 rounded-md transition-all duration-200 font-medium font-inter hover:bg-green-600 hover:text-green-100">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-bell"><path d="M6 8a6 6 0 0 1 12 0c0 7 3 9 3 9H3s3-2 3-9"/><path d="M10.3 21a1.94 1.94 0 0 0 3.4 0"/></svg>
                    <span>Notifications</span>
                </button>
                <button data-view="userProfile" class="nav-button flex items-center space-x-3 p-3 rounded-md transition-all duration-200 font-medium font-inter hover:bg-green-600 hover:text-green-100">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-user"><path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                    <span>My Profile</span>
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
                        <h3 class="text-3xl font-bold mb-2 font-inter">Hello, <span id="dashboardUserName">Jane Doe</span>!</h3>
                        <p class="text-green-100 font-inter">Welcome to your Citizen Portal. Here's a quick overview of your activities.</p>
                    </div>

                    <!-- Recent Applications Card -->
                    <div class="bg-white p-6 rounded-xl shadow-lg border border-gray-200">
                        <h4 class="text-xl font-semibold text-gray-800 mb-4 font-inter">Recent Applications</h4>
                        <div id="recentApplicationsList">
                            <!-- Applications will be injected here by JS -->
                        </div>
                        <button data-target-view="myApplications" class="switch-view-button mt-4 w-full bg-green-500 hover:bg-green-600 text-white py-2 px-4 rounded-lg shadow-md transition-all duration-200 font-inter">
                            View All Applications
                        </button>
                    </div>

                    <!-- Latest Notifications Card -->
                    <div class="bg-white p-6 rounded-xl shadow-lg border border-gray-200">
                        <h4 class="text-xl font-semibold text-gray-800 mb-4 font-inter">Latest Notifications</h4>
                        <div id="latestNotificationsList">
                            <!-- Notifications will be injected here by JS -->
                        </div>
                        <button data-target-view="notifications" class="switch-view-button mt-4 w-full bg-green-500 hover:bg-green-600 text-white py-2 px-4 rounded-lg shadow-md transition-all duration-200 font-inter">
                            View All Notifications
                        </button>
                    </div>

                    <!-- Quick Actions Card -->
                    <div class="bg-white p-6 rounded-xl shadow-lg border border-gray-200">
                        <h4 class="text-xl font-semibold text-gray-800 mb-4 font-inter">Quick Actions</h4>
                        <div class="grid grid-cols-2 gap-4">
                            <button data-target-view="applyService" class="switch-view-button bg-green-500 hover:bg-green-600 text-white py-3 px-4 rounded-lg shadow-md flex flex-col items-center justify-center transition-all duration-200 font-inter">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-plus-circle mb-1"><circle cx="12" cy="12" r="10"/><path d="M8 12h8"/><path d="M12 8v8"/></svg>
                                Apply for Service
                            </button>
                            <button data-target-view="taxPayment" class="switch-view-button bg-purple-500 hover:bg-purple-600 text-white py-3 px-4 rounded-lg shadow-md flex flex-col items-center justify-center transition-all duration-200 font-inter">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-dollar-sign mb-1"><line x1="12" x2="12" y1="2" y2="22"/><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/></svg>
                                Pay Taxes
                            </button>
                            <button data-target-view="userProfile" class="switch-view-button bg-indigo-500 hover:bg-indigo-600 text-white py-3 px-4 rounded-lg shadow-md flex flex-col items-center justify-center transition-all duration-200 font-inter">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-user mb-1"><path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                                My Profile
                            </button>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Apply for Service View -->
            <section id="applyServiceView" class="view-section hidden">
                <div class="bg-white p-6 rounded-xl shadow-lg border border-gray-200">
                    <h3 class="text-2xl font-semibold text-gray-800 mb-6 font-inter">Apply for a New Service</h3>
                    <p class="text-gray-600 mb-4 font-inter">Please select the type of service you wish to apply for:</p>
                    <form id="applyServiceForm" class="space-y-4">
                        <div>
                            <label for="serviceType" class="block text-sm font-medium text-gray-700 font-inter">Service Type</label>
                            <select id="serviceType" name="serviceType" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-green-500 focus:border-green-500 sm:text-sm rounded-md font-inter">
                                <option value="">Select a service</option>
                                <option value="New ID Card Application">New ID Card Application</option>
                                <option value="Driving License Renewal">Driving License Renewal</option>
                                <option value="Birth Certificate Request">Birth Certificate Request</option>
                                <option value="Marriage Certificate Request">Marriage Certificate Request</option>
                                <option value="Business Registration">Business Registration</option>
                                <option value="Property Transfer">Property Transfer</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>
                        <div>
                            <label for="serviceDescription" class="block text-sm font-medium text-gray-700 font-inter">Description / Details</label>
                            <textarea id="serviceDescription" name="serviceDescription" rows="4" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-green-500 focus:border-green-500 sm:text-sm font-inter" placeholder="Provide any additional details for your application..."></textarea>
                        </div>
                        <button type="submit" class="w-full bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-lg shadow-md transition-all duration-200 font-inter">
                            Submit Application
                        </button>
                    </form>
                    <div id="applyServiceMessage" class="mt-4 p-3 rounded-md text-sm font-inter hidden"></div>
                </div>
            </section>

            <!-- Tax Payment View -->
            <section id="taxPaymentView" class="view-section hidden">
                <div class="bg-white p-6 rounded-xl shadow-lg border border-gray-200">
                    <h3 class="text-2xl font-semibold text-gray-800 mb-6 font-inter">Pay Your Taxes</h3>
                    <p class="text-gray-600 mb-4 font-inter">Easily pay your outstanding taxes online.</p>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                        <!-- Outstanding Taxes Card -->
                        <div class="bg-red-50 border border-red-200 p-4 rounded-lg shadow-sm">
                            <h4 class="text-lg font-semibold text-red-700 mb-2 font-inter">Outstanding Property Tax</h4>
                            <p class="text-2xl font-bold text-red-800 font-inter">$1,250.00</p>
                            <p class="text-sm text-red-600 font-inter">Due Date: 2024-08-31</p>
                        </div>
                        <div class="bg-yellow-50 border border-yellow-200 p-4 rounded-lg shadow-sm">
                            <h4 class="text-lg font-semibold text-yellow-700 mb-2 font-inter">Outstanding Income Tax (2023)</h4>
                            <p class="text-2xl font-bold text-yellow-800 font-inter">$350.00</p>
                            <p class="text-sm text-yellow-600 font-inter">Due Date: 2024-09-30</p>
                        </div>
                    </div>

                    <form id="taxPaymentForm" class="space-y-4">
                        <div>
                            <label for="taxType" class="block text-sm font-medium text-gray-700 font-inter">Tax Type</label>
                            <select id="taxType" name="taxType" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-green-500 focus:border-green-500 sm:text-sm rounded-md font-inter">
                                <option value="">Select tax type</option>
                                <option value="Property Tax">Property Tax</option>
                                <option value="Income Tax">Income Tax</option>
                                <option value="Vehicle Tax">Vehicle Tax</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>
                        <div>
                            <label for="taxAmount" class="block text-sm font-medium text-gray-700 font-inter">Amount to Pay ($)</label>
                            <input type="number" id="taxAmount" name="taxAmount" step="0.01" min="0" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-green-500 focus:border-green-500 sm:text-sm font-inter" placeholder="e.g., 1250.00" required>
                        </div>
                        <div>
                            <label for="paymentMethod" class="block text-sm font-medium text-gray-700 font-inter">Payment Method</label>
                            <select id="paymentMethod" name="paymentMethod" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-green-500 focus:border-green-500 sm:text-sm rounded-md font-inter">
                                <option value="">Select method</option>
                                <option value="Credit Card">Credit Card</option>
                                <option value="Debit Card">Debit Card</option>
                                <option value="Bank Transfer">Bank Transfer</option>
                                <option value="Mobile Payment App">Mobile Payment App</option>
                            </select>
                        </div>
                        <button type="submit" class="w-full bg-purple-600 hover:bg-purple-700 text-white font-bold py-2 px-4 rounded-lg shadow-md transition-all duration-200 font-inter">
                            Proceed to Payment
                        </button>
                    </form>
                    <div id="taxPaymentMessage" class="mt-4 p-3 rounded-md text-sm font-inter hidden"></div>
                </div>
            </section>

            <!-- Notifications View -->
            <section id="notificationsView" class="view-section hidden">
                <div class="bg-white p-6 rounded-xl shadow-lg border border-gray-200">
                    <h3 class="text-2xl font-semibold text-gray-800 mb-6 font-inter">Your Notifications</h3>
                    <div id="notificationsList">
                        <!-- Notifications will be injected here by JS -->
                    </div>
                    <div id="announcementsList" class="mt-8 pt-6 border-t border-gray-200">
                        <h4 class="text-xl font-semibold text-gray-800 mb-4 font-inter">Announcements</h4>
                        <!-- Announcements will be injected here by JS -->
                    </div>
                </div>
            </section>

            <!-- User Profile View -->
            <section id="userProfileView" class="view-section hidden">
                <div class="bg-white p-6 rounded-xl shadow-lg border border-gray-200">
                    <h3 class="text-2xl font-semibold text-gray-800 mb-6 font-inter">My Profile</h3>
                    <form id="userProfileForm" class="space-y-4">
                        <div>
                            <label for="profileName" class="block text-sm font-medium text-gray-700 font-inter">Full Name</label>
                            <input type="text" id="profileName" name="profileName" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-green-500 focus:border-green-500 sm:text-sm font-inter" value="Jane Doe" required>
                        </div>
                        <div>
                            <label for="profileEmail" class="block text-sm font-medium text-gray-700 font-inter">Email Address</label>
                            <input type="email" id="profileEmail" name="profileEmail" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-green-500 focus:border-green-500 sm:text-sm font-inter" value="jane.doe@example.com" required>
                        </div>
                        <div>
                            <label for="profilePhone" class="block text-sm font-medium text-gray-700 font-inter">Phone Number</label>
                            <input type="tel" id="profilePhone" name="profilePhone" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-green-500 focus:border-green-500 sm:text-sm font-inter" value="+123 456 7890">
                        </div>
                        <div>
                            <label for="profileAddress" class="block text-sm font-medium text-gray-700 font-inter">Address</label>
                            <textarea id="profileAddress" name="profileAddress" rows="3" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-green-500 focus:border-green-500 sm:text-sm font-inter">123 Main St, Anytown, USA</textarea>
                        </div>
                        <button type="submit" class="w-full bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-lg shadow-md transition-all duration-200 font-inter">
                            Update Profile
                        </button>
                    </form>
                    <div id="userProfileMessage" class="mt-4 p-3 rounded-md text-sm font-inter hidden"></div>
                    <button class="mt-6 w-full bg-gray-200 hover:bg-gray-300 text-gray-800 font-bold py-2 px-4 rounded-lg shadow-md transition-all duration-200 font-inter" onclick="alert('Redirect to Change Password Page (Not implemented in this example)');">
                        Change Password
                    </button>
                </div>
            </section>

        </main>
    </div>

    <script>
        // Mock User Data
        const user = {
            name: 'Jane Doe',
            email: 'jane.doe@example.com',
            userId: 'citizen-12345'
        };

        // Mock Data for various sections
        const mockApplications = [
            { id: 'app001', service: 'New ID Card', date: '2024-07-20', status: 'Pending Review' },
            { id: 'app002', service: 'Driving License Renewal', date: '2024-07-15', status: 'Approved' },
            { id: 'app003', service: 'Property Tax Assessment', date: '2024-07-10', status: 'Completed' },
            { id: 'app004', service: 'Birth Certificate Request', date: '2024-07-01', status: 'Rejected' },
            { id: 'app005', service: 'Vehicle Registration', date: '2024-06-25', status: 'Pending Review' },
            { id: 'app006', service: 'Business License Application', date: '2024-06-18', status: 'Approved' },
        ];

        const mockNotifications = [
            { id: 'notif003', type: 'warning', message: 'Action required: Your property tax payment is due soon.', date: '2024-07-18' },
            { id: 'notif004', type: 'info', message: 'New update available for the Citizen Portal app.', date: '2024-07-10' },
        ];

        const mockAnnouncements = [
            { id: 'ann003', title: 'Community Feedback Session on Local Services', date: '2024-07-25' },
            { id: 'ann004', title: 'Temporary Service Interruption for Property Tax Portal', date: '2024-07-20' },
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

        // Function to render recent applications on the dashboard
        function renderRecentApplications() {
            const container = document.getElementById('recentApplicationsList');
            container.innerHTML = ''; // Clear previous content
            if (mockApplications.length === 0) {
                container.innerHTML = '<p class="text-gray-600 font-inter">No recent applications.</p>';
                return;
            }
            mockApplications.slice(0, 3).forEach(app => {
                const statusClass = app.status === 'Approved' ? 'bg-green-100 text-green-800' :
                                    app.status === 'Pending Review' ? 'bg-yellow-100 text-yellow-800' :
                                    app.status === 'Rejected' ? 'bg-red-100 text-red-800' :
                                    'bg-gray-100 text-gray-800';
                container.innerHTML += `
                    <div class="flex justify-between items-center py-2 border-b last:border-b-0 border-gray-100">
                        <span class="text-gray-700 font-inter">${app.service}</span>
                        <span class="px-3 py-1 text-sm font-medium rounded-full ${statusClass} font-inter">${app.status}</span>
                    </div>
                `;
            });
        }

        // Function to render latest notifications on the dashboard
        function renderLatestNotifications() {
            const container = document.getElementById('latestNotificationsList');
            container.innerHTML = ''; // Clear previous content
            if (mockNotifications.length === 0) {
                container.innerHTML = '<p class="text-gray-600 font-inter">No recent notifications.</p>';
                return;
            }
            mockNotifications.slice(0, 3).forEach(notif => {
                container.innerHTML += `
                    <div class="py-2 border-b last:border-b-0 border-gray-100">
                        <p class="text-gray-700 font-inter">${notif.message}</p>
                        <span class="text-xs text-gray-500 font-inter">${notif.date}</span>
                    </div>
                `;
            });
        }

        // Function to render all applications in My Applications view
        function renderMyApplications() {
            const container = document.getElementById('applicationsTableContainer');
            if (mockApplications.length === 0) {
                container.innerHTML = '<p class="text-gray-600 font-inter">You have not submitted any applications yet.</p>';
                return;
            }

            let tableHtml = `
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider font-inter">Service</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider font-inter">Date Submitted</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider font-inter">Status</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider font-inter">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
            `;
            mockApplications.forEach(app => {
                const statusClass = app.status === 'Approved' ? 'bg-green-100 text-green-800' :
                                    app.status === 'Pending Review' ? 'bg-yellow-100 text-yellow-800' :
                                    app.status === 'Rejected' ? 'bg-red-100 text-red-800' :
                                    'bg-gray-100 text-gray-800';
                tableHtml += `
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 font-inter">${app.service}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 font-inter">${app.date}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-inter">
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full ${statusClass}">
                                ${app.status}
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium font-inter">
                            <button class="text-green-600 hover:text-green-900 ml-2" onclick="alert('Viewing details for ${app.service} (ID: ${app.id})');">View Details</button>
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

        // Function to render all notifications and announcements
        function renderNotificationsAndAnnouncements() {
            const notificationsContainer = document.getElementById('notificationsList');
            notificationsContainer.innerHTML = ''; // Clear previous content
            if (mockNotifications.length === 0) {
                notificationsContainer.innerHTML = '<p class="text-gray-600 font-inter">No notifications.</p>';
            } else {
                mockNotifications.forEach(notif => {
                    const icon = notif.type === 'info' ? '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-info"><circle cx="12" cy="12" r="10"/><path d="M12 16v-4"/><path d="M12 8h.01"/></svg>' :
                                 notif.type === 'success' ? '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-check-circle"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><path d="m9 11 3 3L22 4"/></svg>' :
                                 notif.type === 'warning' ? '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-alert-triangle"><path d="m21.73 18-8-14a2 2 0 0 0-3.46 0l-8 14A2 2 0 0 0 4 21h16a2 2 0 0 0 1.73-3Z"/><path d="M12 9v4"/><path d="M12 17h.01"/></svg>' : '';
                    notificationsContainer.innerHTML += `
                        <div class="flex items-start p-4 mb-3 rounded-lg shadow-sm border ${notif.type === 'info' ? 'bg-green-50 border-green-200' : notif.type === 'success' ? 'bg-green-50 border-green-200' : 'bg-yellow-50 border-yellow-200'}">
                            <span class="mr-3 text-lg ${notif.type === 'info' ? 'text-green-600' : notif.type === 'success' ? 'text-green-600' : 'text-yellow-600'}">${icon}</span>
                            <div>
                                <p class="text-gray-800 font-medium font-inter">${notif.message}</p>
                                <span class="text-xs text-gray-500 font-inter">${notif.date}</span>
                            </div>
                        </div>
                    `;
                });
            }

            const announcementsContainer = document.getElementById('announcementsList');
            announcementsContainer.innerHTML = ''; // Clear previous content
            if (mockAnnouncements.length === 0) {
                announcementsContainer.innerHTML = '<p class="text-gray-600 font-inter">No announcements.</p>';
            } else {
                mockAnnouncements.forEach(ann => {
                    announcementsContainer.innerHTML += `
                        <div class="p-4 mb-3 rounded-lg shadow-sm border border-gray-200 bg-gray-50">
                            <h5 class="text-lg font-semibold text-gray-800 font-inter">${ann.title}</h5>
                            <span class="text-sm text-gray-500 font-inter">${ann.date}</span>
                        </div>
                    `;
                });
            }
        }

        // Function to render FAQs
        function renderFaqs() {
            const container = document.getElementById('faqList');
            container.innerHTML = ''; // Clear previous content
            if (mockFaqs.length === 0) {
                container.innerHTML = '<p class="text-gray-600 font-inter">No FAQs available.</p>';
                return;
            }
            mockFaqs.forEach((faq, index) => {
                container.innerHTML += `
                    <div class="border border-gray-200 rounded-lg overflow-hidden">
                        <button class="w-full text-left p-4 bg-gray-50 hover:bg-gray-100 font-semibold text-gray-700 flex justify-between items-center font-inter"
                                onclick="this.nextElementSibling.classList.toggle('hidden'); this.querySelector('svg').classList.toggle('rotate-180');">
                            <span>${faq.question}</span>
                            <svg class="w-5 h-5 text-gray-500 transform transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </button>
                        <div class="p-4 text-gray-600 bg-white hidden font-inter">
                            ${faq.answer}
                        </div>
                    </div>
                `;
            });
        }

        // Event listener for navigation buttons
        document.addEventListener('DOMContentLoaded', () => {
            // Set user name in sidebar and dashboard
            document.getElementById('sidebarUserName').textContent = user.name;
            document.getElementById('dashboardUserName').textContent = user.name;

            // Add event listeners to sidebar navigation buttons
            document.querySelectorAll('.nav-button').forEach(button => {
                button.addEventListener('click', (event) => {
                    const viewId = event.currentTarget.dataset.view + 'View'; // Append 'View' to match section IDs
                    showView(viewId);

                    // Render content specific to the view when it's activated
                    if (viewId === 'myApplicationsView') {
                        renderMyApplications();
                    } else if (viewId === 'notificationsView') {
                        renderNotificationsAndAnnouncements();
                    } else if (viewId === 'faqView') {
                        renderFaqs();
                    }
                    // For dashboard, recent applications and notifications are rendered initially
                });
            });

            // Add event listeners to quick action buttons on dashboard
            document.querySelectorAll('.switch-view-button').forEach(button => {
                button.addEventListener('click', (event) => {
                    const viewId = event.currentTarget.dataset.targetView + 'View';
                    showView(viewId);

                    // Render content specific to the view when it's activated
                    if (viewId === 'myApplicationsView') {
                        renderMyApplications();
                    } else if (viewId === 'notificationsView') {
                        renderNotificationsAndAnnouncements();
                    } else if (viewId === 'faqView') {
                        renderFaqs();
                    }
                });
            });

            // Handle Apply for Service form submission
            document.getElementById('applyServiceForm').addEventListener('submit', function(event) {
                event.preventDefault(); // Prevent default form submission
                const serviceType = document.getElementById('serviceType').value;
                const serviceDescription = document.getElementById('serviceDescription').value;
                const messageDiv = document.getElementById('applyServiceMessage');

                if (serviceType) {
                    // Simulate API call
                    setTimeout(() => {
                        messageDiv.classList.remove('hidden', 'bg-red-100', 'text-red-800');
                        messageDiv.classList.add('bg-green-100', 'text-green-800');
                        messageDiv.textContent = `Application for "${serviceType}" submitted successfully! We will review your request.`;
                        this.reset(); // Clear form
                        // In a real app, you'd send this data to your Laravel backend via AJAX/Fetch
                        console.log('Submitted Service:', { serviceType, serviceDescription });
                    }, 500);
                } else {
                    messageDiv.classList.remove('hidden', 'bg-green-100', 'text-green-800');
                    messageDiv.classList.add('bg-red-100', 'text-red-800');
                    messageDiv.textContent = 'Please select a service type.';
                }
            });

            // Handle Tax Payment form submission
            document.getElementById('taxPaymentForm').addEventListener('submit', function(event) {
                event.preventDefault(); // Prevent default form submission
                const taxType = document.getElementById('taxType').value;
                const taxAmount = document.getElementById('taxAmount').value;
                const paymentMethod = document.getElementById('paymentMethod').value;
                const messageDiv = document.getElementById('taxPaymentMessage');

                if (taxType && taxAmount && paymentMethod) {
                    // Simulate API call
                    setTimeout(() => {
                        messageDiv.classList.remove('hidden', 'bg-red-100', 'text-red-800');
                        messageDiv.classList.add('bg-green-100', 'text-green-800');
                        messageDiv.textContent = `Payment of $${parseFloat(taxAmount).toFixed(2)} for ${taxType} via ${paymentMethod} successful!`;
                        this.reset(); // Clear form
                        // In a real app, you'd send this data to your Laravel backend via AJAX/Fetch
                        console.log('Submitted Tax Payment:', { taxType, taxAmount, paymentMethod });
                    }, 500);
                } else {
                    messageDiv.classList.remove('hidden', 'bg-green-100', 'text-green-800');
                    messageDiv.classList.add('bg-red-100', 'text-red-800');
                    messageDiv.textContent = 'Please fill in all tax payment details.';
                }
            });

            // Handle User Profile form submission
            document.getElementById('userProfileForm').addEventListener('submit', function(event) {
                event.preventDefault(); // Prevent default form submission
                const profileName = document.getElementById('profileName').value;
                const profileEmail = document.getElementById('profileEmail').value;
                const profilePhone = document.getElementById('profilePhone').value;
                const profileAddress = document.getElementById('profileAddress').value;
                const messageDiv = document.getElementById('userProfileMessage');

                // Simulate API call
                setTimeout(() => {
                    messageDiv.classList.remove('hidden', 'bg-red-100', 'text-red-800');
                    messageDiv.classList.add('bg-green-100', 'text-green-800');
                    messageDiv.textContent = `Profile updated successfully!`;
                    // In a real app, you'd send this data to your Laravel backend via AJAX/Fetch
                    console.log('Updated Profile:', { profileName, profileEmail, profilePhone, profileAddress });
                    // Update the user name in the sidebar and dashboard welcome message
                    document.getElementById('sidebarUserName').textContent = profileName;
                    document.getElementById('dashboardUserName').textContent = profileName;
                }, 500);
            });


            // Handle logout button click
            document.getElementById('logoutButton').addEventListener('click', () => {
                alert('Logged out successfully!'); // Replace with actual logout logic (e.g., redirect to login page)
                // window.location.href = '/logout'; // Example redirect
            });

            // Initial rendering of dashboard content
            renderRecentApplications();
            renderLatestNotifications();

            // Show dashboard view by default
            showView('dashboardView');
        });
    </script>
</body>
</html>
