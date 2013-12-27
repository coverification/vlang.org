## What is Vlang?

**Vlang** is an *opensource* Hardware Verification Language. **Vlang** is available under [Boost Software License](http://www.boost.org/LICENSE_1_0.txt).

**Vlang** also has an implementation of UVM (Universal Verification Methodology). The Vlang UVM library is released under [Apacher 2.0](http://apache.org/licenses/LICENSE-2.0.html) license.

**Vlang** supports sophisticated constrained randomisation of data.

**Vlang** is built on top of D Programming Language, a systems programming language. As a result the rich software features of the underlying [D Programming Language](http://dlang.org) become available to the users of Vlang.

## Motivation
During the last decade we have seen the rise of SystemVerilog as the de facto  standard language for hardware verification. As the first SystemVerilog standard was taking shape at Accellera and later at IEEE, another phenomenon was taking place in the digital world. The returns from Moore's Law started diminishing during the period, and as we progress the Ahmdal's law has started to take a more prominent role than the Moore's law. This one development is changing the way we architect digital systems and also the way we design software.

Concurrency is one issue that has forced the software world to take a look at new paradigms of programming and has given rise to many new languages that try to address the issues involved in multi-core programming. When we talk about functional verification, concurrency is something that comes naturally to hardware engineers. The RTL world has been working with processes that run concurrently all the time. RTL is a well defined discipline and it is possible (at least in theory) to articulate simulation engines that enable concurrency at gate level and RTL level. But at testbench and behavioral simulation levels, concurrency can become feasible only by way of incorporating parallel programming paradigms from the software world. As we go, processor companies are starting to ship processors with as many as 16 cores. If we ignore concurrency, verification will become a significant bottleneck in the next couple of years.

Using a modern programming language as a base, Vlang architects a concurrent implementation of UVM. To attain maximum parallelism, Vlang introduces concurrency at multiple levels. Vlang simulator lets multiple threads run in parallel. Simultaneously, it is also possible to instantiate multiple simulators and run them in parallel, each having its own uvm_root instance. Last but not the least, the base programming language ([D Programming Language](http://dlang.org)) makes it possible to bring in algorithm level parallelism.

### Monolithic vs Polylithic Testbenches
SystemVerilog encourages use of same language and simulator for design and verification. At the outset, having to learn one single language seems to be a big advantage. On the contrary, this monolith approach of creating testbenches has many disadvantages:

1. When the design and the reference model are coded in the same language, there is a greater probability of having the similar gotchas and pitfalls. This gives rise to situations where the verification environment fails to catch a bug in the design because both the verification and design are effected by the same language specific gotcha.
2. A monolith testbench makes it possible for the verification engineer to copy code from the design to the reference model used for verification.
3. A monolithic testbench is tightly integrated with the design and hence makes reuse of the verification environment more difficult.
4. A small incremental change in the verification environment coded in SystemVerilog forces the simulator to elaborate the whole testbench again. And in case the DUT is big, elaboration of testbench takes hours. On the other hand we see that most contemporary modern languages like Go and D have set a goal to reduce the compile time from minutes to a few seconds. A long compile (and elaboration) time becomes an impediment where frequent compile cycles are required. As a result, developers tend to avoid compilation for long development periods and loose on the value provided by such compilation cycle.
