@extends('layout.app')

@section('title', 'Terms and Conditions')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-7">
                        @include('shared.success-message')
                        <div class="mt-3">
                            <h1>Terms and Conditions</h1>

                            <h2>Effective Date: [Insert Date]</h2>

                            <h3>1. Introduction</h3>
                            <p>Welcome to <strong>Relentless</strong>. By accessing or using our application ("App"), you agree to comply with and be bound by the following terms and conditions ("Terms"). These Terms govern your use of the App, including all features, content, and services provided.</p>

                            <h3>2. Acceptance of Terms</h3>
                            <p>By using Relentless, you acknowledge that you have read, understood, and agree to these Terms. If you do not agree with any part of these Terms, you must not use the App.</p>

                            <h3>3. Intellectual Property</h3>
                            <p>All content, features, and functionality of the App, including but not limited to text, graphics, logos, images, and software, are the exclusive property of Relentless and its licensors. You acknowledge that these elements are protected by copyright, trademark, and other intellectual property laws.</p>

                            <h3>4. License to Use</h3>
                            <p>Subject to your compliance with these Terms, Relentless grants you a non-exclusive, non-transferable, revocable license to access and use the App for personal, non-commercial purposes. You may not modify, copy, distribute, transmit, display, perform, or create derivative works based on the App or its content without our prior written consent.</p>

                            <h3>5. User Responsibilities</h3>
                            <ul>
                                <li><strong>Account Security:</strong> If you create an account on the App, you are responsible for maintaining the confidentiality of your account information and for all activities that occur under your account.</li>
                                <li><strong>Prohibited Activities:</strong> You agree not to use the App for any unlawful purpose or to engage in any activity that may harm or disrupt the App, its users, or its servers. This includes but is not limited to: transmitting harmful code, engaging in unauthorized data mining, or attempting to gain unauthorized access to any part of the App.</li>
                            </ul>

                            <h3>6. User Content</h3>
                            <p>You may have the opportunity to submit content to the App, such as comments or reviews ("User Content"). By submitting User Content, you grant Relentless a perpetual, royalty-free, worldwide, and irrevocable license to use, reproduce, modify, and distribute your User Content in connection with the App.</p>

                            <h3>7. Disclaimers</h3>
                            <ul>
                                <li><strong>No Warranty:</strong> The App is provided "as is" and "as available" without warranties of any kind, either express or implied. We do not warrant that the App will be error-free, uninterrupted, or free from viruses or other harmful components.</li>
                                <li><strong>Limitation of Liability:</strong> To the fullest extent permitted by law, Relentless shall not be liable for any indirect, incidental, special, consequential, or punitive damages arising from or related to your use of the App.</li>
                            </ul>

                            <h3>8. Changes to Terms</h3>
                            <p>We reserve the right to update or modify these Terms at any time. Any changes will be effective when posted on the App. Your continued use of the App following any changes constitutes your acceptance of the revised Terms.</p>

                            <h3>9. Termination</h3>
                            <p>We may terminate or suspend your access to the App at any time, with or without cause, and with or without notice, for any reason, including but not limited to your breach of these Terms.</p>

                            <h3>10. Governing Law</h3>
                            <p>These Terms shall be governed by and construed in accordance with the laws of [Your State/Country], without regard to its conflict of law principles.</p>

                            <h3>11. Contact Information</h3>
                            <p>For any questions or concerns regarding these Terms, please contact us at:</p>
                            <p><strong>Relentless Support</strong><br>
                            Email: [support@relentlessapp.com]<br>
                            Address: [Your Company Address]</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@include('shared.footer')
