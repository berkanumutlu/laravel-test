<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class SendUserSubscriptionEmail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mail:send {user: Type of user} {task: Type of task} {--queue=default: Type of queue}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send a subscription email to a user';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        /**
         * protected $signature = 'mail:send {id} {--force}';
         */
        /*$id = $this->argument('id');
        $force = $this->option('force');
        $this->info($id);
        if (!empty($force)) {
            $this->info('true');
        } else {
            $this->info('false');
        }*/

        /*
         * protected $signature = 'mail:send {type=user} {task}';
         */
        /*$arguments = $this->arguments();
        $options = $this->options();
        $type = $this->argument('type');
        $task = $this->argument('task');
        $option = $this->option('queue');*/

        /*
         * Command I/O
         */
        /*$name = $this->ask('What is your name?', 'Berkan');
        $password = $this->secret('What is the password?');
        $name = $this->anticipate('What is your name?', ['Berkan', 'Umutlu']); // Auto-complete for choices*/

        /*
         * Multiple Choice Questions
         */
        /*$defaultIndex = 0;
        $name = $this->choice(
            'What is your name?',
            ['Taylor', 'Dayle'],
            $defaultIndex,
            $maxAttempts = null,
            $allowMultipleSelections = false
        );*/

        /*
         * Writing Output
         */
        /*$this->line('Display this on the screen');
        $this->newLine();
        $this->newLine(3);*/

        /*
         * Tables
         */
        /*$this->table(
            ['Name', 'Email'],
            User::all(['name', 'email'])->toArray()
        );*/

        /*
         * Progress Bars
         */
        /*$users = User::all();
        $bar = $this->output->createProgressBar(count($users));
        $bar->start();
        foreach ($users as $user) {
            // ...
            $bar->advance();
        }
        $bar->finish();
        $this->newline();*/

        /*
         * Calling Commands From Other Commands
         */
        /*$this->call('other:command', [
            'user' => 1, '--queue' => 'default'
        ]);

        $this->callSilently('other:command', [
            'user' => 1, '--queue' => 'default'
        ]);*/

        /*
         * Signal Handling
         */
        /*$this->trap(SIGTERM, fn() => $this->shouldKeepRunning = false);
        while ($this->shouldKeepRunning) {
            // ...
        }

        $this->trap([SIGTERM, SIGQUIT], function (int $signal) {
            $this->shouldKeepRunning = false;

            dump($signal); // SIGTERM / SIGQUIT
        });*/

        /*$this->alert('Sending subscription email started.');
        $id = $this->ask('Please enter the user ID');
        $user = User::find($id);
        if (!empty($user)) {
            if ($this->confirm('Do you want to send a subscription email to "'.$user->name.'<'.$user->email.'>" ?')) {
                try {
                    Mail::to($user)->send(new UserSubscriptionMail($user));
                    $this->info('User subscription email sent.');
                } catch (\Exception $exception) {
                    $this->error($exception->getMessage());
                }
                Artisan::call('cache:clear');
            } else {
                $this->warn('Sending subscription email canceled.');
            }
        } else {
            $this->warn('User does not exist.');
        }
        $this->alert('Sending subscription email ended.');*/
    }
}
