<?php
namespace App\Services;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class NexarionState
{
    public const MODULES = [
        'site','page_heroes','stats','services','projects','process','pricing','posts','team',
        'testimonials','jobs','faqs','tech','values','why','legal','contact_options'
    ];

    private function defaults(): array
    {
        return [
            'site' => [[
                'id' => 'site-main',
                'brand' => 'NEXARION',
                'tagline' => 'Technology & Digital Solutions',
                'logo' => '',
                'vision' => 'To become a trusted technology partner that helps businesses and organizations create meaningful digital experiences.',
                'mission' => 'Build high-quality digital products, deliver modern user-focused experiences, help businesses adopt technology, continuously innovate, and build long-term client relationships.',
                'story1' => 'NEXARION started from a simple observation: most businesses do not need more technology — they need the right technology, built carefully, by people who understand both the code and the business behind it.',
                'story2' => 'We are a team of designers, engineers, and strategists who believe good digital products come from clarity: clear goals, clear process, and clear communication. That belief shapes everything we ship.',
                'founded' => '[YEAR]', 'teamSize' => '[TEAM_SIZE]', 'focus' => 'Web & Software', 'city' => '[CITY]',
                'careersBenefits' => 'Competitive salary, flexible hours, remote-friendly, hardware budget, and real ownership of your work.',
                'footerBlurb' => 'Technology & digital solutions built around real business goals.',
                'responseTime' => 'We reply within one business day.',
            ]],
            'page_heroes' => [
                ['id'=>'hero-home','page'=>'home','kicker'=>'NEXARION — Technology & Digital Solutions','title'=>'Building digital experiences for the next generation','subtitle'=>'NEXARION creates modern digital solutions, powerful websites, and intelligent technology experiences designed to help businesses grow in the digital era.'],
                ['id'=>'hero-about','page'=>'about','kicker'=>'01 — About Us','title'=>'We turn ideas into digital experiences','subtitle'=>'NEXARION is a technology-driven company focused on creating modern digital solutions that combine design, technology, usability, and business objectives.'],
                ['id'=>'hero-services','page'=>'services','kicker'=>'Services','title'=>'Technology designed around your business','subtitle'=>'From your first landing page to complex internal systems — explore what we build and how each service works.'],
                ['id'=>'hero-portfolio','page'=>'portfolio','kicker'=>'Portfolio','title'=>'Work that speaks in results','subtitle'=>'Case studies, products, and digital experiences delivered across different business needs.'],
                ['id'=>'hero-process','page'=>'process','kicker'=>'Process','title'=>'A clear path from idea to launch','subtitle'=>'A transparent delivery process so you always know what is happening, what is next, and why.'],
                ['id'=>'hero-pricing','page'=>'pricing','kicker'=>'Pricing','title'=>'Clear starting points, flexible scope','subtitle'=>'Choose a starting package or request a custom estimate for more complex requirements.'],
                ['id'=>'hero-blog','page'=>'blog','kicker'=>'Blog','title'=>'Insights from the workshop','subtitle'=>'Practical writing on technology, design, and digital business.'],
                ['id'=>'hero-team','page'=>'team','kicker'=>'Our Team','title'=>'The people behind the work','subtitle'=>'Meet the people responsible for strategy, design, engineering, and delivery.'],
                ['id'=>'hero-careers','page'=>'careers','kicker'=>'Careers','title'=>'Join the next generation of builders','subtitle'=>'We hire for craft, curiosity, and honesty. If you build things carefully and communicate clearly, talk to us.'],
                ['id'=>'hero-faq','page'=>'faq','kicker'=>'FAQ','title'=>'Questions, answered','subtitle'=>'The things clients ask most before starting a project.'],
                ['id'=>'hero-contact','page'=>'contact','kicker'=>'Contact','title'=>'Let’s build something great together','subtitle'=>'Fill in the project brief below — the more context you give, the sharper our first response will be.'],
            ],
            'stats' => [
                ['id'=>'stat-1','value'=>'50','suffix'=>'+','label'=>'Projects Completed','visible'=>true],
                ['id'=>'stat-2','value'=>'30','suffix'=>'+','label'=>'Happy Clients','visible'=>true],
                ['id'=>'stat-3','value'=>'5','suffix'=>'+','label'=>'Digital Services','visible'=>true],
                ['id'=>'stat-4','value'=>'99','suffix'=>'%','label'=>'Commitment','visible'=>true],
            ],
            'process' => [
                ['id'=>'process-1','n'=>'01','t'=>'Discovery','d'=>'Understanding business goals and requirements.','visible'=>true],
                ['id'=>'process-2','n'=>'02','t'=>'Strategy','d'=>'Planning product structure and technical approach.','visible'=>true],
                ['id'=>'process-3','n'=>'03','t'=>'Design','d'=>'Creating UI/UX and visual direction.','visible'=>true],
                ['id'=>'process-4','n'=>'04','t'=>'Development','d'=>'Building and integrating the product.','visible'=>true],
                ['id'=>'process-5','n'=>'05','t'=>'Testing','d'=>'Testing functionality, responsiveness, and performance.','visible'=>true],
                ['id'=>'process-6','n'=>'06','t'=>'Launch','d'=>'Deployment and production setup.','visible'=>true],
                ['id'=>'process-7','n'=>'07','t'=>'Support','d'=>'Maintenance, optimization, and improvements.','visible'=>true],
            ],
            'values' => [
                ['id'=>'value-1','i'=>'spark','t'=>'Innovation','d'=>'Constantly exploring new ideas and technologies.','visible'=>true],
                ['id'=>'value-2','i'=>'shield','t'=>'Integrity','d'=>'Building trust through transparency and responsibility.','visible'=>true],
                ['id'=>'value-3','i'=>'award','t'=>'Excellence','d'=>'Maintaining high standards in every project.','visible'=>true],
                ['id'=>'value-4','i'=>'users','t'=>'Collaboration','d'=>'Working closely with clients and partners.','visible'=>true],
                ['id'=>'value-5','i'=>'zap','t'=>'Impact','d'=>'Creating technology that delivers meaningful results.','visible'=>true],
            ],
            'why' => [
                ['id'=>'why-1','i'=>'cpu','t'=>'Modern Technology','d'=>'We use current, relevant technology — chosen for longevity, not hype.','visible'=>true],
                ['id'=>'why-2','i'=>'users','t'=>'User-Centered Design','d'=>'Every decision starts from what your users actually need, validated by research.','visible'=>true],
                ['id'=>'why-3','i'=>'phone','t'=>'Responsive by Default','d'=>'Optimal on desktop, tablet, and mobile.','visible'=>true],
                ['id'=>'why-4','i'=>'layers','t'=>'Scalable Architecture','d'=>'Built so it can grow without starting over.','visible'=>true],
                ['id'=>'why-5','i'=>'search','t'=>'Transparent Process','d'=>'You always know what stage your project is in, what is next, and why.','visible'=>true],
                ['id'=>'why-6','i'=>'shield','t'=>'Long-Term Support','d'=>'Maintenance and support plans that keep your product healthy for years.','visible'=>true],
            ],
            'tech' => [
                ['id'=>'tech-frontend','category'=>'Frontend','items'=>['HTML','CSS','JavaScript','React','Next.js'],'visible'=>true],
                ['id'=>'tech-backend','category'=>'Backend','items'=>['Node.js','Python','Django','Laravel'],'visible'=>true],
                ['id'=>'tech-database','category'=>'Database','items'=>['MySQL','PostgreSQL','MongoDB','SQLite'],'visible'=>true],
                ['id'=>'tech-tools','category'=>'Tools','items'=>['Git','GitHub','Figma','VS Code'],'visible'=>true],
            ],
            'legal' => [
                ['id'=>'legal-privacy','kind'=>'privacy','title'=>'Privacy Policy','updated'=>'September 30, 2026','intro'=>'This policy explains how information submitted through this website is handled. Review it with legal counsel before production use.','sections'=>[
                    ['Data Collection','We collect information you voluntarily provide through contact and application forms, together with basic technical data required to operate the service.'],
                    ['Contact Forms','Information submitted through forms is stored in the NEXARION administration system so the team can respond to your request.'],
                    ['Data Usage','Submitted data is used to communicate with you, evaluate requests, and deliver or improve services.'],
                    ['Data Rights','You may request access to, correction of, or deletion of your personal data by contacting the company through the channels on the Contact page.'],
                ],'visible'=>true],
                ['id'=>'legal-terms','kind'=>'terms','title'=>'Terms & Conditions','updated'=>'September 30, 2026','intro'=>'These terms provide a general website and service framework. Review them with legal counsel before relying on them in production.','sections'=>[
                    ['Services','NEXARION provides website development, UI/UX design, custom software, digital solutions, and maintenance services. Specific scope is defined per project agreement.'],
                    ['Client Responsibilities','Clients are expected to provide accurate information, timely feedback, and materials they have the legal right to use.'],
                    ['Intellectual Property','Ownership and portfolio-display rights should follow the signed project agreement.'],
                    ['Payments','Deposits, milestones, due dates, and any late-payment terms are defined in the applicable project agreement.'],
                ],'visible'=>true],
                ['id'=>'legal-cookies','kind'=>'cookies','title'=>'Cookie Policy','updated'=>'September 30, 2026','intro'=>'This page explains the cookies or similar storage used by the website. Update it whenever analytics or third-party tracking is added.','sections'=>[
                    ['Essential Storage','The website may use essential session storage required for secure administration and form protection.'],
                    ['Analytics','If analytics are enabled, list the provider, purpose, and retention period here.'],
                    ['Your Choices','Where required, visitors should be given a way to accept or reject non-essential cookies.'],
                ],'visible'=>true],
            ],
            'contact_options' => [
                ['id'=>'budget-1','group'=>'Budget','label'=>'< Rp 5 jt','visible'=>true],
                ['id'=>'budget-2','group'=>'Budget','label'=>'Rp 5 – 15 jt','visible'=>true],
                ['id'=>'budget-3','group'=>'Budget','label'=>'Rp 15 – 50 jt','visible'=>true],
                ['id'=>'budget-4','group'=>'Budget','label'=>'> Rp 50 jt','visible'=>true],
                ['id'=>'budget-5','group'=>'Budget','label'=>'Not sure yet','visible'=>true],
                ['id'=>'timeline-1','group'=>'Timeline','label'=>'< 1 month','visible'=>true],
                ['id'=>'timeline-2','group'=>'Timeline','label'=>'1 – 3 months','visible'=>true],
                ['id'=>'timeline-3','group'=>'Timeline','label'=>'3 – 6 months','visible'=>true],
                ['id'=>'timeline-4','group'=>'Timeline','label'=>'Flexible','visible'=>true],
            ],
        ];
    }

    public function adminState(?int $userId = null): array
    {
        $s = (array) (DB::table('site_settings')->where('id', 1)->first() ?? []);
        $u = $userId ? DB::table('users')->where('id', $userId)->first() : null;
        $out = [
            'v' => 4,
            'settings' => [
                'user' => $u->username ?? 'nexarion.owner',
                'email' => $s['email'] ?? '', 'whatsapp' => $s['whatsapp'] ?? '',
                'instagram' => $s['instagram'] ?? '', 'linkedin' => $s['linkedin'] ?? '',
                'address' => $s['address'] ?? '', 'hours' => $s['hours'] ?? '',
                'maintenance' => (bool) ($s['maintenance'] ?? false),
                'mMsg' => $s['maintenance_message'] ?? '',
            ],
        ];

        $defaults = $this->defaults();
        foreach (self::MODULES as $module) {
            $rows = DB::table('content_items')->where('module', $module)->orderBy('sort_order')->get();
            if ($rows->isEmpty() && isset($defaults[$module])) {
                $out[$module] = $defaults[$module];
                continue;
            }
            $out[$module] = $rows->map(function ($r) {
                $d = json_decode($r->data, true) ?: [];
                if (!empty($d['_empty'])) return null;
                return ['id' => $r->uid] + $d;
            })->filter()->values()->all();
        }

        $out['messages'] = DB::table('messages')->orderByDesc('created_at')->get()->map(fn ($m) => [
            'id' => $m->uid, 'from' => $m->from_name, 'email' => $m->email,
            'date' => $m->created_at ? strtotime($m->created_at) * 1000 : round(microtime(true) * 1000),
            'read' => (bool) $m->is_read, 'star' => (bool) $m->is_starred,
            'subject' => $m->subject, 'body' => $m->body,
        ])->all();
        $out['notices'] = DB::table('notices')->orderByDesc('sent_at')->get()->map(fn ($n) => [
            'id' => $n->uid, 't' => $n->sent_at ? strtotime($n->sent_at) * 1000 : round(microtime(true) * 1000),
            'to' => $n->recipient_count, 'subject' => $n->subject, 'body' => $n->body,
        ])->all();
        $out['activity'] = DB::table('activities')->orderByDesc('occurred_at')->limit(300)->get()->map(fn ($a) => [
            't' => strtotime($a->occurred_at) * 1000, 'type' => $a->type, 'msg' => $a->message,
        ])->all();
        return $out;
    }

    public function saveAdminState(array $state): void
    {
        DB::transaction(function () use ($state) {
            $st = $state['settings'] ?? [];
            DB::table('site_settings')->updateOrInsert(['id' => 1], [
                'email' => $st['email'] ?? '', 'whatsapp' => $st['whatsapp'] ?? '',
                'instagram' => $st['instagram'] ?? '', 'linkedin' => $st['linkedin'] ?? '',
                'address' => $st['address'] ?? '', 'hours' => $st['hours'] ?? '',
                'maintenance' => (bool) ($st['maintenance'] ?? false),
                'maintenance_message' => $st['mMsg'] ?? '', 'updated_at' => now(),
            ]);

            foreach (self::MODULES as $module) {
                if (!array_key_exists($module, $state) || !is_array($state[$module])) continue;
                DB::table('content_items')->where('module', $module)->delete();
                if (count($state[$module]) === 0) {
                    DB::table('content_items')->insert([
                        'uid' => '__empty__-' . $module, 'module' => $module, 'sort_order' => 0,
                        'data' => json_encode(['_empty' => true]), 'created_at' => now(), 'updated_at' => now(),
                    ]);
                    continue;
                }
                foreach (array_values($state[$module]) as $i => $item) {
                    $uid = (string) ($item['id'] ?? Str::uuid());
                    unset($item['id']);
                    DB::table('content_items')->insert([
                        'uid' => $uid, 'module' => $module, 'sort_order' => $i,
                        'data' => json_encode($item, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES),
                        'created_at' => now(), 'updated_at' => now(),
                    ]);
                }
            }

            if (isset($state['messages']) && is_array($state['messages'])) {
                foreach ($state['messages'] as $m) {
                    $uid = (string) ($m['id'] ?? Str::uuid());
                    DB::table('messages')->updateOrInsert(['uid' => $uid], [
                        'from_name' => $m['from'] ?? 'Unknown', 'email' => $m['email'] ?? 'unknown@example.com',
                        'subject' => $m['subject'] ?? 'Message', 'body' => $m['body'] ?? '',
                        'is_read' => (bool) ($m['read'] ?? false), 'is_starred' => (bool) ($m['star'] ?? false),
                        'created_at' => isset($m['date']) ? date('Y-m-d H:i:s', (int) $m['date'] / 1000) : now(),
                        'updated_at' => now(),
                    ]);
                }
            }
            if (isset($state['notices']) && is_array($state['notices'])) {
                DB::table('notices')->delete();
                foreach ($state['notices'] as $n) {
                    DB::table('notices')->insert([
                        'uid' => (string) ($n['id'] ?? Str::uuid()), 'subject' => $n['subject'] ?? 'Notice',
                        'recipient_count' => (int) ($n['to'] ?? 0), 'body' => $n['body'] ?? null,
                        'sent_at' => isset($n['t']) ? date('Y-m-d H:i:s', (int) $n['t'] / 1000) : now(),
                        'created_at' => now(), 'updated_at' => now(),
                    ]);
                }
            }
            if (isset($state['activity']) && is_array($state['activity'])) {
                DB::table('activities')->delete();
                foreach (array_slice($state['activity'], 0, 300) as $a) {
                    DB::table('activities')->insert([
                        'type' => $a['type'] ?? 'system', 'message' => $a['msg'] ?? '',
                        'occurred_at' => isset($a['t']) ? date('Y-m-d H:i:s', (int) $a['t'] / 1000) : now(),
                        'created_at' => now(), 'updated_at' => now(),
                    ]);
                }
            }
        });
    }

    private function visible(array $items): array
    {
        return array_values(array_filter($items, fn ($x) => !array_key_exists('visible', $x) || (bool) $x['visible']));
    }

    public function publicData(): array
    {
        $state = $this->adminState(null);
        $out = [];
        $out['site'] = $state['site'][0] ?? [];
        $out['heroes'] = [];
        foreach ($state['page_heroes'] as $h) if (!empty($h['page'])) $out['heroes'][$h['page']] = $h;
        $out['stats'] = $this->visible($state['stats']);

        $out['services'] = array_map(function ($x, $i) {
            $x['slug'] = $x['slug'] ?? Str::slug($x['title'] ?? 'service');
            $x['num'] = $x['num'] ?? str_pad((string) ($i + 1), 2, '0', STR_PAD_LEFT);
            foreach (['tags','tech','problems','whatWeBuild','benefits'] as $k) $x[$k] = is_array($x[$k] ?? null) ? $x[$k] : [];
            $x['overview'] = $x['overview'] ?? ($x['desc'] ?? ''); $x['solution'] = $x['solution'] ?? $x['overview'];
            return $x;
        }, $this->visible($state['services']), array_keys($this->visible($state['services'])));

        $out['projects'] = array_map(function ($x) {
            $x['slug'] = $x['slug'] ?? Str::slug($x['title'] ?? 'project'); $x['seed'] = $x['seed'] ?? $x['slug'];
            $x['big'] = (bool) ($x['big'] ?? false); $x['tech'] = is_array($x['tech'] ?? null) ? $x['tech'] : [];
            $x['result'] = is_array($x['result'] ?? null) ? $x['result'] : []; $x['img'] = $x['img'] ?? ''; $x['link'] = $x['link'] ?? '';
            $x['client'] = $x['client'] ?? ''; $x['status'] = $x['status'] ?? 'Completed';
            foreach (['challenge','research','strategy','design','development'] as $k) $x[$k] = $x[$k] ?? '';
            return $x;
        }, $this->visible($state['projects']));

        $out['process'] = $this->visible($state['process']);
        $out['values'] = $this->visible($state['values']);
        $out['why'] = $this->visible($state['why']);
        $out['tech'] = [];
        foreach ($this->visible($state['tech']) as $x) if (!empty($x['category'])) $out['tech'][$x['category']] = is_array($x['items'] ?? null) ? $x['items'] : [];

        $out['posts'] = array_values(array_map(function ($x) {
            $x['slug'] = $x['slug'] ?? Str::slug($x['title'] ?? 'post'); $x['seed'] = $x['seed'] ?? $x['slug']; $x['img'] = $x['img'] ?? '';
            $raw = (string) ($x['body'] ?? ''); $sections = []; $cur = ['h' => '', 'ps' => []];
            foreach (preg_split('/\n\s*\n/', trim($raw)) ?: [] as $part) {
                $part = trim($part); if ($part === '') continue;
                if (str_starts_with($part, '## ')) { if ($cur['h'] !== '' || $cur['ps']) $sections[] = $cur; $cur = ['h' => trim(substr($part, 3)), 'ps' => []]; }
                else $cur['ps'][] = $part;
            }
            if ($cur['h'] !== '' || $cur['ps']) $sections[] = $cur;
            $x['body'] = $sections ?: [['h' => '', 'ps' => ['Content coming soon.']]]; return $x;
        }, array_filter($state['posts'], fn ($p) => ($p['status'] ?? 'Published') === 'Published')));

        $out['team'] = array_map(function ($x) { $x['skills'] = is_array($x['skills'] ?? null) ? $x['skills'] : []; $x['linkedin'] = $x['linkedin'] ?? ''; $x['instagram'] = $x['instagram'] ?? ''; $x['img'] = $x['img'] ?? ''; return $x; }, $this->visible($state['team']));
        $out['testimonials'] = array_map(fn ($x) => ['q'=>$x['quote']??'','n'=>$x['name']??'','r'=>$x['role']??''], $this->visible($state['testimonials']));
        $out['jobs'] = array_values(array_map(function ($x) { return ['t'=>$x['title']??'','type'=>$x['type']??'Full-time','loc'=>$x['loc']??'','desc'=>$x['desc']??'','resp'=>is_array($x['resp']??null)?$x['resp']:[],'req'=>is_array($x['req']??null)?$x['req']:[],'benefits'=>is_array($x['benefits']??null)?$x['benefits']:[]]; }, array_filter($state['jobs'], fn ($j) => ($j['status'] ?? 'Open') === 'Open')));
        $out['faqs'] = $this->visible($state['faqs']);
        $out['pricing'] = array_map(fn ($x) => ['n'=>$x['name']??'','p'=>$x['price']??'','per'=>$x['per']??'/project*','t'=>$x['tagline']??'','hot'=>(bool)($x['popular']??false),'f'=>array_values(array_filter(array_map('trim', preg_split('/\r?\n/', (string)($x['features']??'')) ?: [])))], $this->visible($state['pricing']));

        $out['legal'] = [];
        foreach ($this->visible($state['legal']) as $x) if (!empty($x['kind'])) $out['legal'][$x['kind']] = $x;
        $out['contactOptions'] = ['budgets'=>[], 'timelines'=>[]];
        foreach ($this->visible($state['contact_options']) as $x) {
            if (($x['group'] ?? '') === 'Budget') $out['contactOptions']['budgets'][] = $x['label'] ?? '';
            if (($x['group'] ?? '') === 'Timeline') $out['contactOptions']['timelines'][] = $x['label'] ?? '';
        }
        $out['settings'] = $state['settings']; unset($out['settings']['user']);
        return $out;
    }
}
