<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SupportTicket;
use App\Models\User;

class SupportTicketSeeder extends Seeder
{
    public function run(): void
    {
        $users = User::all();
        $categories = ['general', 'technical', 'billing', 'complaint', 'suggestion'];
        $priorities = ['low', 'medium', 'high', 'urgent'];
        $statuses = ['open', 'in_progress', 'resolved'];

        $subjects = [
            'Issue with product rental',
            'Payment not processed',
            'Cannot access my account',
            'Product not as described',
            'Request for refund',
            'Technical problem with website',
            'Question about rental process',
            'Complaint about lender',
            'Suggestion for improvement',
            'Billing inquiry',
        ];

        foreach ($users as $user) {
            // Create 1-3 tickets per user
            for ($i = 0; $i < rand(1, 3); $i++) {
                SupportTicket::create([
                    'user_id' => $user->id,
                    'subject' => $subjects[array_rand($subjects)],
                    'category' => $categories[array_rand($categories)],
                    'priority' => $priorities[array_rand($priorities)],
                    'status' => $statuses[array_rand($statuses)],
                    'message' => "This is a support ticket message from {$user->first_name} {$user->last_name}. I need help with my rental experience.",
                    'attachments' => rand(0, 1) ? json_encode(["attachment_{$i}.pdf", "image_{$i}.jpg"]) : null,
                ]);
            }
        }

        // Create some recent open tickets
        for ($i = 0; $i < 5; $i++) {
            $user = $users->random();
            
            SupportTicket::create([
                'user_id' => $user->id,
                'subject' => "Urgent: Issue with recent order",
                'category' => 'technical',
                'priority' => 'urgent',
                'status' => 'open',
                'message' => "I'm having an urgent issue with my recent rental. Please help me resolve this as soon as possible.",
            ]);
        }
    }
}
